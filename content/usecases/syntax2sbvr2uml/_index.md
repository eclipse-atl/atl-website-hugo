---
title: "Production of UML class diagrams from syntactical models of english text or SBVR models"
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

# Production of UML class diagrams from syntactical models of english text or SBVR models

> **By [Mathias Kleiner](mailto:mathias.kleiner@inria.fr) (INRIA)** \
> April 2009

This work presents a case study of obtaining a UML class diagram from a syntactical analysis of a text using SBVR as an intermediate layer. We show how it is possible, with the help of model engineering, to realize two transformations: from a syntactical model into a SBVR model, and from a SBVR model into a UML model. This work has been done in collaboration between the ATLANMOD team in Nantes and the ILOG company.

## Keywords

Syntactical analysis, parsing, [SBVR](https://www.omg.org/spec/SBVR/1.0/), UML class diagrams.

## Overview

In this use case, we present a scenario for producing conceptual schemas in UML class diagrams out of a syntactically analyzed english text. The usecase chains two transformations and uses three metamodels (two of them from existing OMG's specifications). The first transformation produces SBVR models from Syntax models, where Syntax is an originally proposed metamodel for capturing syntax, grammatical dependencies and semantics of english sentences. The second transformation produces UML models from SBVR models. Each transformation can be used separately or chained depending on the scenario. These transformations have been successfully used in an application that first generates a syntax model from plain english text using constraint-based parsing techniques. The automatic syntactical analysis is however outside the scope of this usecase. The Syntax models can be either created manually or obtained using any language parsing technique. The packaged Eclipse project contains the three metamodels in KM3 and ECORE format, the two transformations in ATL format, and example models in XMI format.

In the following, we present an overview of the three metamodels, as well as a scenario example through terminal models corresponding to the sentence "Each company sells at least one product". This example is one of the scenarios included in the packaged Eclipse project.

Figure 1 presents an excerpt of the Syntax metamodel. The main class is "Cat", which represents a syntactical category. Categories can be either terminal (i.e with an associated word), or non-terminal (i.e containing other categories, a group of words). The main non-terminal categories are "SentenceCat" (sentences), "NPCat" (noun phrases), "VPCat" (verb phrases). The main terminal categories are "NCat" (nouns), "VCat" (verbs), "DCat" (determiners). Categories are related by grammatical dependencies, such as "subject" from verbs to noun phrases. Categories may also express an SBVR semantic through the "expresses" optional association.

{{< figure src="Syntax.png" caption="Figure 1: Excerpt of the Syntax metamodel" width="60%" >}}

Figure 2 presents a fragment of a Syntax model for the sentence "Each company sells at least one product".

{{< figure src="RunningExample-Syntax.png" caption="Figure 2: Fragment of a Syntax model for our running example" width="60%" >}}

Figures 3 and 4 present an excerpt of the SBVR metamodel, mainly the taxonomy of concepts "Representation", "Meaning" and "LogicalFormulation".

{{< figure src="SBVR-Meaning.PNG" caption="Figure 3: Excerpt of the SBVR metamodel: meanings" width="60%" >}}

{{< figure src="SBVR-LogicalFormulation.png" caption="Figure 4: Excerpt of the SBVR metamodel: logical formulations" width="60%" >}}

Figure 5 presents a fragment of the SBVR model obtained with the transformation "Syntax2SBVR" from the previously shown Syntax model.

{{< figure src="RunningExample-SBVR.png" caption="Figure 5: Fragment of a SBVR model for our running example" width="60%" >}}

Figure 6 presents a fragment of the UML model obtained with the transformation "SBVR2UML" from the previously shown SBVR model.

{{< figure src="RunningExample-UML.png" caption="Figure 6: Fragment of a UML model for our running example" width="60%" >}}

## Related Use Cases

None at the current time.

##  Download

{{< grid/div class="col-md-6" >}}
### [Packaged Eclipse project](../../atltransformations/#syntax-to-sbvr-to-uml)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
The packaged Eclipse project, available in the ATL transformation zoo (with source files), contains the three metamodels in KM3 and ECORE format, the two ATL transformations, and a set of model samples as XMI files.
{{</ grid/div >}}

