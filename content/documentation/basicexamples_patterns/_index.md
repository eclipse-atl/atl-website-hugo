---
title: "Basic Examples and Patterns"
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

{{< header >}}

# ATL Basic Examples and Patterns

This section provides a set of basic examples and patterns.

## Families to Persons

**February 2007**

> This presentation describes a very simple model transformation example, some kind of ATL "hello world".
> 
> *ATL concepts encountered:* Header section, Helper functions, Matched rules
> 
> *Additional concepts encountered:* Metamodel and conformance relation, ATL IDE (ADT)
> * [Presentation Families to Persons](../old/ATLUseCase_Families2Persons.pdf) \
>   February 2007 \
>   by Freddy Allilaire, Frédéric Jouault (INRIA)
>
> * [Source code Families to Persons](../../atltransformations/Families2Persons/Families2Persons.zip) \
>   February 2007 \
>   by Freddy Allilaire, Frédéric Jouault (INRIA) 

## Tree to List

**July 2007**

> This transformation presents a basic example where a tree is transformed into a list. This kind of transformation is usually made by an imperative Depth First Traversal algorithm.
> 
> *ATL concepts encountered:* Matched rules (one with a guard), Helper functions (one being recursive), Collection related functions, Enumeration, and ATL resolve algorithm.
> 
>  * [Article Tree to List](tree2list/) \
>    July 2007 \
>    by Cyril Faure ([C-S](http://www.c-s.fr/)), Freddy Allilaire (INRIA)
> 
>  * [Source code Tree to List](../../atltransformations/Tree2List/Tree2List.zip) \
>    July 2007
>    by Cyril Faure ([C-S](http://www.c-s.fr/)), Freddy Allilaire (INRIA)

## List Metamodel Refactoring

**December 2007**

> In this example, we present some basic concepts of ATL through a simple use case. Our working context is the creation of a bridge between two different versions of a List metamodel (A and B). This bridge consists on an ATL transformation from the version A to the version B.
> 
> *ATL concepts encountered:* Automatic traceability support in ATL, Handling collection, and String operation.
> 
>   * [Article List Metamodel Refactoring](listmetamodelrefactoring/) \
>     December 2007 \
>     by Cyril Faure ([C-S](http://www.c-s.fr/)), Freddy Allilaire (INRIA)
> 
>   * [Source code List Metamodel Refactoring](../../atltransformations/ListMetamodelRefactoring/ListMetamodelRefactoring.zip) \
>     December 2007 \
>     by Cyril Faure ([C-S](http://www.c-s.fr/)), Freddy Allilaire (INRIA)

## Port

**January 2008**

> In this example, we present some basic concepts of ATL through a simple use case. This use case deals with situations where the source element meta type could not be simply matched with the target meta type. The only way to resolve the target meta type is to browse source model.
> 
> *ATL concepts encountered:* Matched rules and lazy (matched) rules, Avoiding some imperative constructs, and Code optimization.
> 
>  * [Article Port](port/) \
>    January 2008 \
>    by Cyril Faure ([C-S](http://www.c-s.fr/)), Freddy Allilaire (INRIA)
> 
>  * [Source code Port](../../atltransformations/Port/Port.zip) \
>    January 2008 \
>    by Cyril Faure ([C-S](http://www.c-s.fr/)), Freddy Allilaire (INRIA)

## Side Effect

**January 2008**

> This case deals with the way to handle side effects induced while transforming an element. We will start from an imperative algorithm to create a transformation between two metamodels. This algorithm will introduce a side effect problem. After several iteration a solution will be provided following ATL philosophy.
> 
> *ATL concepts encountered:* ATL imperative parts for dealing with complex situation, and Chain of ATL transformations to divide transformation complexity and to avoid imperative parts.
> 
>  * [Article Side Effect](sideeffect/) \
>    January 2008 \
>    by Cyril Faure ([C-S](http://www.c-s.fr/)), Freddy Allilaire (INRIA)
> 
>  * [Source code Side Effect](../../atltransformations/SideEffect/SideEffect.zip) \
>    January 2008 \
>    by Cyril Faure ([C-S](http://www.c-s.fr/)), Freddy Allilaire (INRIA) 

## Latest changes
