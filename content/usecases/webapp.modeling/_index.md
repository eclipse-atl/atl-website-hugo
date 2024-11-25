---
title: "Modeling Web applications"
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

# Modeling Web applications

> **By Juan M. Vara Mesa** \
> October 2007



In this Use Case we show how the AMMA tools have been used to implement part of a method for Web Applications development. More specifically we use KM3 to define a pair of DSLs based on the behavioral modeling elements of UML 2.0 and the ATL language to implement the mappings between them. The gap between those DSLs makes it very complex to obtain directly an ATL transformation that works for any input model. More information is needed in order to automatize the mappings. In a real MDE context, this additional input should take the shape of a model. Here we show how a model weaving can be used to *parameterize* model transformations by defining an **annotation** model.

## Overview

The aim of this Use Case was to implement a set of mappings previously defined using the ATL language. Once we started to code the ATL program, we realised that some information needed to generate the target model was not included in the source model. For each execution of the transformation some extra data was needed. In some sense, these extra data can be shown as a way of parameterizing the transformation.

In this context, the first option was to extend the source metamodel in order to support the modeling of these extra data. However this meant polluting the metamodel with concepts not relevant for the domain that it represented. We needed a diferent way to collect these extra data that was related with the source model but not included in it. Finally, since this information or parameters had to be available from the ATL program and considering that we were in a MDE context, the best option was to use another model (and thus to define a new metamodel).

However, a metamodel is intended to represent a new domain and we needed not to be able to model a new set of concepts. In fact we just needed to provide with some extra information about the elements of some existing models. Since there already existed a base metamodel for modeling relations between model elements (the core weaving metamodel), and even better, there was a base metamodel for annotating a model (the the Annotation extension), we decided to use them in order to define a new weaving metamodel. The process followed is summarized in the figure below.

{{< figure src="images/UseCase.Overview.png" caption="Use Case Overview" >}}

For each execution of the ATL program, i.e., for each source model, we define a weaving model that conforms to an annotation extension of the core weaving metamodel. The weaving model contains a set of annotations that represent the information needed to execute the transformation, that is, the parameters using by some of the rules of the ATL program. So, both, the source and the weaving model are taking as inputs to generate the output model.

## Additional Information and Download

{{< grid/div class="col-md-6" >}}
### [Using model annotations for Web applications modeling](description/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This document provides more detail about how model annotations are used in this Use Case. It contains a complete description of the models considered and the context in which they are defined.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Detailed description and User Guide](resources/User.Guide.pdf)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
A complete description of this Use Case. It describes the content of the example provided and it details how to execute it. It also provides with general information about how to define annotation models and how to use ANT tasks to execute ATL transformations.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Example](resources/SOD-M.zip)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
An ATL project containing both a simplified scenary and a complete one.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [AMW Extension](resources/org.eclipse.gmt.weaver.kybele.EUC.Annotation_1.0.0.zip)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This plug-in that extends the AMW plug-in. When the weaver wizard for creating weaving models is launched, it shows the defined extension of the core weaving metamodel. This way, it is not needed to load it by hand.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

## Related Use Cases

{{< grid/div class="col-md-6" >}}
### [Model annotations in Java 1.4](https://www.eclipse.org/gmt/amw/usecases/annotation/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case shows how weaving models are used to annotate Java 1.4 metamodels.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Metamodel Annotation for Ontology Design](https://www.eclipse.org/gmt/amw/usecases/oamusecase/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case presents a Model Driven solution for annotating models in order to obtain ontologies.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

## Acknowledgement

The present work is been supported by the GOLD project financed by the Spanish Ministry of Education and Science (TIN2005-00010) and the FoMDAs project (URJC-CM-2006-CET-0387) cofinanced by the [Rey Juan Carlos university](https://www.urjc.es/) and the Regional Government of Madrid.

## Recent changes
