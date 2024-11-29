---
title: "Measuring UML models"
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

# Measuring UML models

> **By Freddy Allilaire (INRIA), Rémi Schnekenburger (CEA LIST)** \
> May 2007

This use case shows how to use and integrate a model transformation service in a UML Modeler to compute and generate quality measures on UML models.

## Keywords

UML Modeler, [UML 2](https://www.eclipse.org/modeling/mdt/?project=uml2), Measures.

## Overview

This use case presents how the Papyrus UML Modeler could be used to compute and generate quality measures on UML models. [Papyrus](https://eclipse.dev/papyrus/) is a dedicated tool for UML2 graphical modelling developed mainly by [CEA LIST](https://list.cea.fr/fr/). This open source tool is based on the Eclipse environment.

The figure below presents an example of UML Class Diagram made with Papyrus. Measures will be generated and computed on this working example:

{{< figure src="img/UMLClassDiagram.PNG" caption="Sample of UML 2 Class Diagram" >}}

The generation of measures on a UML model allows to perform several investigations. For example measuring the various models may bring interesting insight into the consideration of these models. Furthermore comparing similar measures applied to models of various origins may bring interesting observations.

From a UML Class Diagram, the following measures are available and will be computed when the ATL service "Generate Measures" will be executed:

  * **Total Number of Packages:** TNP is the total number of packages in the model.

  * **Total Number of Classes:** TNC is the total number of classes in a package or the model.

  * **Total Number of Attributes:** TNA is the total number of attributes in a class, package or the model.

  * **Depth Inheritance Tree:** In cases involving multiple inheritances, the DIT will be the maximum length from the node to the root of the tree.

  * **Number of Children:** NOC is the number of immediate subclasses subordinated to a class in the class hierarchy.

  * **Number of Attributes:** NA is defined as the total number of attributes in a class.

  * **Number of Attributes Inherited:** NAI is defined as the total number of attributes inherited by a subclass.

  * **Attribute Inheritance Factor:** The Attribute Inheritance Factor (AIF) is defined as a quotient between the sum of inherited attributes in all classes of the system under consideration and the total number of available attributes (locally defined plus inherited) for all classes.

Others and more complex measures could be easily added and implemented by modifying the corresponding ATL transformation. To see how to configure and run the "Measuring UML models" ATL service, please take a look to the [User Guide](userguide/).

The computed metrics will be displayed in 3 different representations: **Tabular HTML**, **SVG Bar Chart**, and **SVG Pie Chart**. The figures below present the sample results generated from our working example:

  * **Tabular HTML** {{< figure src="img/tabularHTML.PNG" >}}

&nbsp;

  * **SVG Bar Chart** {{< figure src="img/barChart.PNG" >}}

&nbsp;

  * **SVG Pie Chart** {{< figure src="img/pieChart.PNG" width="70%" >}}

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
### [User Guide](userguide/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This user guide explains how to configure and launch the ATL service in Papyrus.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

##  Acknowledgement

The present work is being supported by the Usine Logicielle project of the System@tic Paris Region Cluster.
