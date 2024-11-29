---
title: "The List Metamodel Refactoring example"
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

# The List Metamodel Refactoring example

> **Summary**
> 
> In this example, we present some basic concepts of ATL through a simple use case. Our working context is the creation of a bridge between two different versions of a List metamodel (A and B). This bridge consists on an ATL transformation from the version A to the version B.
> 
> In this example, we discover how: to use automatic traceability support in ATL, to create an ordered set, to use operation on string type.
> 
> **By Cyril Faure (CS) and Freddy Allilaire (INRIA)** \
> Copyright © 2007 CS and INRIA. \
> December, 2007

## Introduction

This example deals with the refactoring of a simple metamodel. We want to bridge two different versions of a metamodel thanks to a model transformation. 

## The Metamodels

{{< figure src="img/TypeA.PNG" caption="Metamodel A" >}}

The metamodel **A** is composed of two elements which represent a simple list of named elements.

{{< figure src="img/TypeB.PNG" caption="Metamodel B" >}}

The metamodel **B** is a evolution of metamodel **A**. It defines the same concepts except **RootB** lost its name.

## Refactoring Transformation

### Transformation principles

In this transformation, we want to transform an element **RootA** into a **RootB** and to transform an element **ElementA** into a **ElementB**. Some additional constraints should be respected:

  * The elements order in the list should be kept.
  * An **ElementB** should be created from the name of a **RootA**. This element is added at the first list position.
  * The name of each **ElementB** should start with 'B_'

To sum up, the created list will contain one more element than the initial list. This additional element is created from the name of the list root. It will be placed at the first position of the list.

### Transformation step by step

First, we create the skeleton of the rule "Root". A **RootB** element is created from a **RootA** element.

	rule Root { 
		from
			s : A!RootA 
		to
			t : B!RootB (
	
			)
	}

We create now the rule called "Element". This rule transforms an **ElementA** into an **ElementB**. For the name of each **ElementB**, the name of the matching **ElementA** is reused and 'B_' is added to respect our constraint defined in the transformation requirements.

	rule Element {
		from
			s : A!ElementA
		to
			t : B!ElementB (
				name <- 'B_' + s.name
			)
	}

For both metamodels, the root element contains the list elements. We can update the rule "Root" with the following code to use automatic traceability support in ATL (i.e. ATL Resolve Algorithm).

	rule Root { 
		from
			s : A!RootA 
		to
			t : B!RootB (
				elms <- s.elms
			)
	}

Thanks to this code, all elements **ElementB** will be contained in the **RootB**.

The last requirement of our transformation is to create an additional **ElementB** from the name of the **RootA**. This element will be added at the first position of the list.

	rule Root { 
		from
			s : A!RootA 
		to
			t : B!RootB (
				elms <- OrderedSet {first_element, s.elms}
			),
			first_element : B!ElementB (
				name <- 'B_' + s.name
			)
	}

Here is now the complete ATL module transforming a model A into a model B.

	rule Root { 
		from
			s : A!RootA 
		to
			t : B!RootB (
				elms <- OrderedSet {first_element, s.elms}
			),
			first_element : B!ElementB (
				name <- 'B_' + s.name
			)
	}
	
	rule Element {
		from
			s : A!ElementA
		to
			t : B!ElementB (
				name <- 'B_' + s.name
			)
	}

## Conclusion

What we have learnt with this example:

  * using automatic traceability support in ATL.
  * creating an ordered set.
  * using operation on string type.

Some improvements can be done. For example, a helper could be used to factorize the **ElementB** name creation.

## Download
	
  * [ListMetamodelRefactoring](../../../atltransformations/ListMetamodelRefactoring/ListMetamodelRefactoring.zip): Source code for the scenario List Metamodel Refactoring.

## Acknowledgement

The present work is being supported by the Usine Logicielle project of the System@tic Paris Region Cluster.
 