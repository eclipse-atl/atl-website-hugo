---
title: "Using a UML modeler to generate metamodels"
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

# Using a UML modeler to generate metamodels

> **By Freddy Allilaire (INRIA), Rémi Schnekenburger (CEA LIST)** \
> May 2007

This use case shows how to use and integrate a model transformation service in a UML Modeler to generate metamodels conforming to KM3, MOF 1.4, and Ecore.

## Keywords

UML Modeler, [UML 2](https://www.eclipse.org/modeling/mdt/?project=uml2), Metamodels, Ecore, MOF 1.4, [KM3](https://wiki.eclipse.org/KM3/).

## Overview

This use case presents how the Papyrus UML Modeler could be used to generate metamodels. Papyrus is a dedicated tool for modelling within UML2 developed by CEA LIST. This open source tool is based on the Eclipse environment.

> **Metamodel definition**
>
> A metamodel is a model that defines the concepts and relationships that may be created in a model. A model always conforms to a metamodel. This relation is called conformance. The conformance relation has a different nature than the representation relation between a model and its system. A metamodel does not represent a model (that could be considered a system), but only the concepts and relationships that may be created. A metamodel conforms to a metametamodel.

The metamodel will be generated from its description done via a UML 2 Class Diagram produced with Papyrus (an open-source graphical modeler tool for UML2 and based on Eclipse). UML 2 Class Diagrams are the mainstay of object-oriented analysis and design. They show the classes of the system, their interrelationships (including inheritance, aggregation, and association), and the operations and attributes of the classes. Class diagrams are used for a wide variety of purposes, including both conceptual/domain modeling and detailed design modeling. The figure below presents an example of UML Class Diagram made with Papyrus.

{{< figure src="img/UMLClassDiagram.PNG" caption="Sample of UML 2 Class Diagram" >}}

From a UML Class Diagram, there is the possibility to generate a metamodel in the following formats:

  * **[KM3](https://wiki.eclipse.org/KM3/):** KM3 (Kernel Meta Meta Model) is a neutral language to write metamodels and to define Domain Specific Languages.
  * **EMF XMI 2.0, conforming to Ecore:** Ecore is the metametamodel used by EMF. The EMF project is a modeling framework and code generation facility for building tools and other applications based on a structured data model.
  * **MDR XMI 1.2, conforming to MOF 1.4:** [MOF (Meta Object Facility)](https://www.omg.org/mof/) is an OMG standard enabling to describe metamodels through common semantics.

To see how to configure and run the "Generate Metamodel" ATL service, please take a look to the [User Guide](userguide/).

Each action (e.g. "Generate metamodel in Ecore") will execute a corresponding ATL model transformation (e.g. "UML 2.0 to Ecore"). Both following figures present samples of generated metamodels in **EMF XMI 2.0** and **KM3** formats.

{{< figure src="img/Ecore.PNG" caption="EMF Ecore metamodel" >}}

{{< figure src="img/KM3File.PNG" caption="KM3 metamodel" >}}

## Related Use Cases

None at the current time.

## References

  1. Hoare, C.A.R Monitors: An Operating System Structuring Concept Communications of the ACM, Vol. 17, No. 10. October 1974, pp. 549-557
  2. Dijkstra, E. W. Cooperating Sequential Processes. In programming Languages (Ed. F. Genuys), Academic Press, New York.

##  Download

{{< figure src="../../images/Papyrus_48x48.gif" class="float-left" link="https://eclipse.dev/papyrus/" >}}
{{< grid/div class="col-md-5" >}}
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
**[Papyrus](https://eclipse.dev/papyrus/)**, an open-source graphical modeler tool for UML2 and based on Eclipse.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [KM3](https://wiki.eclipse.org/KM3/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
KM3 is a neutral language to write metamodels and to define DSL.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [User Guide](userguide/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This user guide explains how to configure and launch the ATL service in Papyrus.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Source code](../../atltransformations/UML2KM3/UML2KM3.zip)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
Source code of the ATL scenario used in this use case.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

##  Acknowledgement

The present work is being supported by the Usine Logicielle project of the System@tic Paris Region Cluster.

## Latest changes
