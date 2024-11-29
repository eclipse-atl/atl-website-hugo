---
title: "Models Measurement"
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

# Models Measurement

> **By Éric Vépa ([SODIUS](https://www.sodius.com/))** \
> July 2007

This use case shows how to compute and generate measures on terminal models using ATL 2.0RC2. The measures can be processed on KM3 metamodels or UML models. And the measurement data can be represented with HTML, SVG or XHTML. This work has been done in collaboration between [SODIUS](https://www.sodius.com) and the ATLAS Group.

As a complementary application to this contribution, an online service is provided at [SODIUS](https://www.sodius.com)'s web site under the name "MC-Meter". The application offers you to freely measure your models and get an interactive report on them, using the Open Source contribution. The input models can be KM3 meta-models or UML models (in version 2.1), and the interactive report is sent back by email, using XHTML format with CSS. Sample of inputs and interactive reports are available on the service page.

The online measurement service is available at: http://www.mdworkbench.com/measuring.php

A complete list of implemented metrics is available at: http://www.mdworkbench.com/measurement/metrics/definition.htm

## Keywords

KM3, UML, Measures, HTML, XHTML, SVG, Pie Chart, Bar Chart

## Overview

This use case shows how to compute and generate measures on KM3 meta-models or UML models, and how to display them in different way. This use case is composed of two main parts.

The first step is the measurement process. Metrics are implemented for KM3 meta-model or UML models using metric sets found in the literature [1]. Each metric set is implemented as an ATL library. An ATL transformation is implemented for each kind of input terminal model and shows how to use the libraries of metrics. A model of Measure is produced at the end of this step.

The second step is the presentation process. The computed metrics stored in the model of Measure can be displayed in four different representations: Tabular HTML, SVG Bar Chart, SVG Pie Chart or interactive XHTML with CSS.

The figures below present the sample results generated for a KM3 metamodel and for a UML model:

{{< figure src="img/tabularHTML_1Small.PNG" caption="Figure 1: Example of Tabular HTML presentation on a KM3 metamodel" >}}

{{< figure src="img/barChart_1Small.PNG" caption="Figure 2: Example of SVG Bar Chart presentation on a KM3 metamodel" >}}

{{< figure src="img/pieChart_1Small.PNG" caption="Figure 3: Example of SVG Pie Chart presentation on a KM3 metamodel" >}}

{{< figure src="img/XHTML_1.PNG" caption="Figure 4: Example of interactive XHTML with CSS presentation on a KM3 metamodel" >}}

{{< figure src="img/tabularHTML_2.PNG" caption="Figure 5: Example of Tabular HTML presentation on a UML model" >}}

{{< figure src="img/barChart_2Small.PNG" caption="Figure 6: Example of SVG Bar Chart presentation on a UML model" >}}

{{< figure src="img/pieChart_2Small.PNG" caption="Figure 7: Example of SVG Pie Chart presentation on a UML model" >}}

{{< figure src="img/XHTML_2.PNG" caption="Figure 8: Example of interactive XHTML with CSS presentation on a UML model" >}}

## Related Use Cases

{{< grid/div class="col-md-6" >}}
### [Measuring UML models](../measuring_uml_models/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case shows how to use and integrate a model transformation service in a UML Modeler to compute and generate quality measures on UML models. The used UML Modeler is [Papyrus](https://eclipse.dev/papyrus/) ([CEA LIST](https://list.cea.fr/)).
{{</ grid/div >}}

&nbsp;

&nbsp;

## References

  1. Baroni, A.L.: Formal Definition of Object-Oriented Design Metrics. Master Thesis, Vrije University, Brussel, Belgium, 2002.

##  Download

  * [Complete scenario](../../atltransformations/#models-measurement): Scenario **Models Measurement** available in the ATL transformation zoo (with source files).

## Acknowledgement

This work has been partially funded by the FLFS ANR project (Families of Language for Families of Systems).
