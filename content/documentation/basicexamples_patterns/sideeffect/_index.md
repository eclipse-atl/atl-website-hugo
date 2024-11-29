---
title: "The side effect example"
#headline: "The Community for Open Innovation and Collaboration"
#tagline: "The Eclipse Foundation provides our global community of individuals and organizations with a mature, scalable, and business-friendly environment for open source software collaboration and innovation."
hide_page_title: true
hide_sidebar: true
#hide_breadcrumb: true
#show_featured_story: true
#layout: "single"
#links: [[href: "/projects/", text: "Projects"],[href: "/org/workinggroups/", text: "Working Group"],[href: "/membership/", text: "Members"],[href: "/org/value", text: "Business Value"]]
#container: "container-fluid"
---

# The side effect example

> **Summary**
>
>  This case deals with the way to handle side effects induced while transforming an element. We will start from an imperative algorithm to create a transformation between two metamodels. This algorithm will introduce a side effect problem. After several iteration a solution will be provided following ATL philosophy.
>
> In this example, we discover how: to use ATL imperative parts for dealing with complex situation, and to use a chain of ATL transformations to divide transformation complexity and to avoid imperative parts.
>
> **By Cyril Faure (CS) and Freddy Allilaire (INRIA)** \
> Copyright © 2007-2008 CS and INRIA. \
> January, 2008

## Introduction

This case deals with the way to handle side effects induced while transforming an element. We will start from an imperative algorithm to create a transformation between two metamodels. This algorithm will introduce a side effect problem. After several iteration we will provide a solution following ATL philosophy.

## The Metamodels

{{< figure src="img/TypeA.PNG" caption="Metamodel A" >}}

The metamodel **A** is composed of two concepts which represent a simple list of named elements. Different **ElementA** can have the same name.

{{< figure src="img/TypeB.PNG" caption="Metamodel B" >}}

The metamodel **B** defines a slightly different concept with a third concept called **DefinitionB**. In this metamodel, a **RootB** element has a set of **DefinitionB** whose role is to gather and to factorize all **ElementB** name. All **DefinitionB** elements (in the context of the same **RootB** element) must have different name attribute value.

## Goal of the transformation

The goal of this example is to transform a **RootA** element into a **RootB** one and an **ElementA** into an **ElementB** one. Created **ElementB** will not contain the name from the **ElementA**. The name will be used to create a **DefinitionB** element with the requirement that each **DefinitionB** (i.e. name value) is unique.

The figure below illustrates transformation goal with an example:

{{< figure src="img/SideEffect_bigPicture.PNG" caption="Transformation Big Picture" >}}

## A first implementation

In this example, we will start with the "point of view" of an "imperative language developer" to create our transformation from metamodel A to metamodel B. Here is an algorithm we can propose in "imperative way":

> **RootA** element is transformed into **RootB** and for each **ElementA**,
>
>   * we create an **ElementB**
>   * we store **b** in the **RootB.elms** containment relation
>   * we make a traversal of **RootB.defs**. For each **d : DefinitionB**,
>       * if **a.name = d.name**, then we put the **d** reference as **b** 's definition : **b.def <- d** and end the traversal
>       * else, we carry on the traversal to the next element
>   * if no definition **d** has been found such as **a.name = d.name**:
>       * we create a **newD : DefinitionB** where **newD.name = a.name**
>       * we put the **newD** reference as **b** 's definition: **b.def <- newD**

As one can see, for each **ElementB** created whose definition is not already available, the algorithm creates it on-the-fly, inducing a side effect.

The following implementation succeeded to reproduce the algorithm described above by writing a single rule transforming the source root object into the target root object. Note this rule may be dangerous as it assumes the ATL engine executes the bindings in the order they are written in the code.

**Remark:** The target model is browsed in this transformation, this is **strongly discouraged in ATL**.

	module TypeA2TypeB;
	create b : TypeB from a : TypeA;

	-- This helper retrieves all names and removes all duplicates
	helper context TypeA!RootA def : getDefNameSet() : Set(String) =
		self.elms->collect(e|e.name).asSet();

	rule RootA2RootB {
		from
			rtA : TypeA!RootA
		to
			-- this rule is dangerous as we suppose the ATL engine executes...
			rtB : TypeB!RootB (
				-- this line before...
				defs <- defBLst,
				-- this one.
				elms <- elmBLst
			),
			defBLst : distinct TypeB!DefinitionB foreach(defName in rtA.getDefNameSet ())(
				name <- defName
			),
			elmBLst : distinct TypeB!ElementB foreach (elmA in rtA.elms) (
				-- here the target model is browsed
				definition <- rtB.defs->select (d | d.name = elmA.name )->first()
			)
	}

As one can see, the described algorithm contains a side effect where the **DefinitionB** elements creation are made on-the-fly. This implementation makes a dangerous assertion as the ATL engine does not ensure the bindings execution order (this is a consequence of target model browsing).

## How to follow the ATL philosophy

In respect of the ATL philosophy, we would like to have a rule where:

	rule ElmA2ElmB {
		from
			elmA : A!ElementA
		to
			elmB : B!ElementB(

			)
	}

However if we plan to use such a rule, how can we set the **defs** reference and reproduce the associated side effect (on-the-fly **DefinitionB** creation) in a more functional way?

The following ATL code proposed an other solution to reach transformation goal:

	module TypeA2TypeB;
	create b : TypeB from a : TypeA;

	rule RootA2RootB {
		from
			rtA : TypeA!RootA
		to
			rtB : TypeB!RootB (
				defs <- rtA.elms->iterate(e; res : Set(TypeA!ElementA) = Set {} |
					if (res->collect(f | f.name)->includes(e.name)) then
						res
					else
						res->including(e)
					endif
					)-- here we keep only one element of each name value
					->collect(e | thisModule.Definition(e)),
					-- then we create a DefinitionB from each selected element
				elms <- rtA.elms
			)
	}

	lazy rule Definition {
		from
			s : TypeA!ElementA
		to
			t : TypeB!DefinitionB(
				name <- s.name
			)
	}

	helper def: nameToAssignHistory : Sequence(TupleType(e : TypeB!ElementB, s : String)) =
		Sequence {};

	rule NameToAssign (e : TypeB!ElementB, s : String) {
		do {
			thisModule.nameToAssignHistory <- thisModule.nameToAssignHistory->append(Tuple {e = e, s = s});
		}
	}

	rule Element {
		from
			s : TypeA!ElementA
		to
			t : TypeB!ElementB(
			)
		do {
			-- The corresponding name for the current ElementB is added in the map.
			-- This map will be used at the end of the transformation to create a link between ElementB and DefinitionB
			thisModule.NameToAssign(t, s.name);
		}
	}

	-- execute delayed actions
	endpoint rule EndRule() {
		do {
			for(dta in thisModule.nameToAssignHistory) {
				-- We create a link between an ElementB and the corresponding DefinitionB
				dta.e.definition <- TypeB!DefinitionB.allInstancesFrom('b')->any(e | e.name = dta.s);
			}
		}
	}

This ATL transformation also required target models browsing (even this is done in the endpoint). This solution may be consider better than the first one, but it does not give satisfaction. As you can see, it uses some imperative constructs that made it more difficult to understand and to maintain. As it seems not possible to solve this by using only one transformation without imperative code, we should consider to solve it by using a chain of transformations. This will allow us to solve each problem in a different transformation.

The general overview of our approach is presented in the following figure:

{{< figure src="img/SideEffect_lastVersionScenario.png" >}}

### First step: A to Partial_B

In the first step, we create a partial model B containing the list of **DefinitionB** elements.

	module TypeA2TypeB;
	create b : TypeB from a : TypeA;

	rule RootA2RootB {
		from
			rtA : TypeA!RootA
		to
			rtB : TypeB!RootB (
				defs <- rtA.elms->iterate(e; res : Set(TypeA!ElementA) = Set {} |
					if (res->collect(f | f.name)->includes(e.name)) then
						res
					else
						res->including(e)
					endif
					)->collect(e | thisModule.Definition(e))
			)
	}

	lazy rule Definition {
		from
			s : TypeA!ElementA
		to
			t : TypeB!DefinitionB(
				name <- s.name
			)
	}

### Second step: A and Partial_B to B

In the second step, we can easily solve the problem by using in input parameter the output model created by the first step transformation.

	module TypeA2TypeB;
	create b : TypeB from a : TypeA, bIn : TypeB;

	rule RootA2RootB {
		from
			rtA : TypeA!RootA, rtBIN : TypeB!RootB
		to
			rtB : TypeB!RootB (
				defs <- rtBIN.defs,
				elms <- rtA.elms
			)
	}

	rule Definition {
		from
			s : TypeB!DefinitionB
		to
			t : TypeB!DefinitionB(
				name <- s.name
			)
	}

	rule Element {
		from
			s : TypeA!ElementA
		to
			t : TypeB!ElementB(
				definition <- TypeB!DefinitionB.allInstancesFrom('bIn')->any(e | e.name = s.name)
			)
	}

## Conclusion

What we have learnt with this example:

  * Using ATL imperative parts for dealing with complex situation.
  * Using a chain of ATL transformations to divide transformation complexity and to avoid imperative parts.

## Download

  * [SideEffect](../../../atltransformations/SideEffect/SideEffect.zip): Source code for the scenario SideEffect.

## Acknowledgement

The present work is being supported by the Usine Logicielle project of the System@tic Paris Region Cluster.

