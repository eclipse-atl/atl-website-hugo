---
title: "The in/out ports example"
#headline: "The Community for Open Innovation and Collaboration"
#tagline: "The Eclipse Foundation provides our global community of individuals and organizations with a mature, scalable, and business-friendly environment for open source software collaboration and innovation."
hide_page_title: true
hide_sidebar: true
#hide_breadcrumb: true
#show_featured_story: true
layout: "single"
#links: [[href: "/projects/", text: "Projects"],[href: "/org/workinggroups/", text: "Working Group"],[href: "/membership/", text: "Members"],[href: "/org/value", text: "Business Value"]]
#container: "container-fluid"
---

# The in/out ports example

> **Summary**
> 
> In this example, we present some basic concepts of ATL through a simple use case. This use case deals with situations where the source element meta type could not be simply matched with the target meta type. The only way to resolve the target meta type is to browse source model.
> 
> We will discover how: to use matched rules and lazy (matched) rules, to avoid some imperative constructs, and to make a first code optimization.
> 
> **By Cyril Faure (CS) and Freddy Allilaire (INRIA)** \
> Copyright © 2007-2008 CS and INRIA. \
> January, 2008

## Introduction

This use case deals with situations where the source element meta type could not be simply matched with the target meta type. The only way to resolve the target meta type is to browse source model. 

## The Metamodels

{{< figure src="img/TypeA.PNG" caption="Metamodel A" >}}

The metamodel **A** describes a block/port structure where a block can have several input and/or output ports. The port type direction is distinguished via its container relation's name: **inputPorts** or **outputPorts**. Both input and output ports are represented via the **PortA** concept.

{{< figure src="img/TypeB.PNG" caption="Metamodel B" >}}

The metamodel **B** describes the same basic concepts but differentiates input and output ports via two new concepts: **InPortB** and **OutPortB**.

## Transformation principles

These transformation principles are pretty straightforward as both metamodels strictly represent the same block/port concept.

For a **BlockA**, we create a **BlockB** and:

  * for each input port of **aBlock.inputPorts**, we create an **InPortB**.
  * for each output port of **aBlock.outputPorts**, we create an **OutPortB**.

## A first implementation

A first idea to transform **A** to **B** could be to use the **distinct** clause as shown in the following piece of code (each element is "manually" transformed by iterating on each source port element):

	rule BlkA2BlkB {
		from
			blkA : TypeA!BlockA
		to
			blkB : TypeB!BlockB (
				inputPorts <- inPts,
				outputPorts <- outPts
			),
			inPts : distinct TypeB!InPortB foreach(ptA in blkA.inputPorts)(
					name <- ptA.name),
			outPts : distinct TypeB!OutPortB foreach(ptA in blkA.outputPorts)(
					name <- ptA.name)
					
	}

Even though **distinct-foreach** is not an imperative construct, it could be considered bad practice when it is a translation of an imperative algorithms. 

## How to follow the ATL philosophy

In ATL, developers should avoid bad habits of imperative programming i.e. explicit creation of elements. They should focus on the **What** and not the **How**.

What kind of rule(s) do we have to write? The common way to replace distinct-foreach instruction is to use lazy rules instead. So the previous code could be updated as follow:

	rule BlkA2BlkB {
		from
			blkA : TypeA!BlockA
		to
			blkB : TypeB!BlockB (
				inputPorts <- blkA.inputPorts->
								collect(e | thisModule.PortA2InPortB(e)),
				outputPorts <- blkA.outputPorts->
								collect(e | thisModule.PortA2OutPortB(e))
			)
	}
	
	lazy rule PortA2InPortB {
		from
			s : TypeA!PortA
		to
			t : TypeB!InPortB (
				name <- s.name
			)
	}
	
	lazy rule PortA2OutPortB {
		from
			s : TypeA!PortA
		to
			t : TypeB!OutPortB (
				name <- s.name
			)
	}

Lazy rules should be used when it is not possible to directly match an element from the source model. In our case, an input port is created from an input port and an output is created from an output port. It clearly appears that a simple solution is possible by using only automatic traceability links (i.e. we can avoid to explicitly call matched rules dealing with Port as done in the previous code with lazy rules).

	rule BlkA2BlkB {
		from
			blkA : TypeA!BlockA
		to
			blkB : TypeB!BlockB (
				inputPorts <- blkA.inputPorts,
				outputPorts <- blkA.outputPorts
			)
	}
	
	rule PortA2InPortB {
		from
			s : TypeA!PortA (
				TypeA!BlockA.allInstances()->
					select(e | e.inputPorts->includes(s))->notEmpty()
			)
		to
			t : TypeB!InPortB (
				name <- s.name
			)
	}
	
	rule PortA2OutPortB {
		from
			s : TypeA!PortA (
				TypeA!BlockA.allInstances()->
					select(e | e.outputPorts->includes(s))->notEmpty()
			)
		to
			t : TypeB!OutPortB (
				name <- s.name
			)
	}

The matched rule **PortA2OutPortB** has a guard filtering only output ports and the matched rule **PortA2InPortB** has a guard filtering only input ports from the input model.

When this transformation will be applied on big models, evaluation of the guard could be time-consuming. Some optimizations in each guard could be done by using **refImmediateComposite()** operation. **refImmediateComposite()** is a reflective operation that returns the immediate composite (e.g. the immediate container).

	rule BlkA2BlkB {
		from
			blkA : TypeA!BlockA
		to
			blkB : TypeB!BlockB (
				inputPorts <- blkA.inputPorts,
				outputPorts <- blkA.outputPorts
			)
	}
	
	rule PortA2InPortB {
		from
			s : TypeA!PortA (
				s.refImmediateComposite().inputPorts->includes(s)
			)
		to
			t : TypeB!InPortB (
				name <- s.name
			)
	}
	
	rule PortA2OutPortB {
		from
			s : TypeA!PortA (
				s.refImmediateComposite().outputPorts->includes(s)
			)
		to
			t : TypeB!OutPortB (
				name <- s.name
			)
	}

## Conclusion

What we have learnt with this example:

  * using matched rules.
  * using lazy (matched) rules.
  * avoiding some imperative constructs.
  * making a first code optimization.

## Download
	
  * [Port](../../../atltransformations/Port/Port.zip): Source code for the scenario Port.

## Acknowledgement

The present work is being supported by the Usine Logicielle project of the System@tic Paris Region Cluster.
