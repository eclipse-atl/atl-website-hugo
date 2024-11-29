---
title: "Software Build Tools Interoperability (Make, Ant, Maven)"
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

# Software Build Tools Interoperability (Make, Ant, Maven)

> **By Freddy Allilaire, Frédéric Jouault (INRIA)** \
> February 2007

## Keywords

Interoperability, [Build Tools](https://en.wikipedia.org/wiki/Build_tool), [Ant](https://ant.apache.org/), [Make](https://www.gnu.org/software/make/manual/html_node/index.html), [Maven](https://maven.apache.org/).

## Overview

In this use case we present how to bridge different build tools between themselves: Make, Ant, and Maven. Make, one of the most common build tool, has its own syntax and can be used only on UNIX platform. Ant is platform-independent and its syntax is XML-based. It is extended using Java classes. Maven is an extension proposed in addition to Ant functionalities. It proposes an easier creation of plug-in and it allows more reusability contrary to Ant. Maven need two build files: project.xml (project descriptor), and maven.xml.

In this case study, from a "Make configuration" we will generate a corresponding "Ant configuration" and "Maven configuration". The overall approach is summarized in the following figure:

{{< figure src="img/UseCaseOverview.png" caption="\"Software Build Tools Interoperability (Make, Ant, Maven)\" Use Case's Overview" >}}

For each build tool, we have defined its metamodel by using the KM3 textual format (Ant, Make, Maven). A visual presentation of these metamodels is also available (Ant, Make, Maven).

The Injection and Extraction phases were implemented by using XML bridges. As the Ant and Maven files are XML-based, we can inject an XML-based file or extract into an XML-based file the content of a model (conforms to the XML metamodel). As a Make is not an XML-based tool, we have created an ad-hoc solution to transform a Makefile into a corresponding XML file.

The Model-to-Model transformation phase was implemented by using ATL model-to-model transformations. Following bridges "Make to Ant" and "Ant to Maven" have been developped with ATL.

We provide below a set of screenshots showing the different input/output files provided/created with this use case:

{{< figure src="img/Samples.png" caption="Screenshots of the input/outputs of the use case" >}}

## Related Use Cases

None at the current time.

##  Download

{{< grid/div class="col-md-6" >}}
### [Complete Scenario](scenario/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
Scenario available in the ATL transformation zoo (with source files).
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Metamodels](metamodels/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
All the provided metamodels are expressed in the Ecore format and also in the KM3 textual format.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

##  Acknowledgement

The present work is being supported by the [OpenEmbeDD project](http://openembedd.inria.fr/), and the Usine Logicielle project of the System@tic Paris Region Cluster.

## Latest changes
