---
title: "Software Quality Control Tools Interoperability (Bugzilla, Mantis, Excel)"
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

# Software Quality Control Tools Interoperability (Bugzilla, Mantis, Excel)

> **By Freddy Allilaire, Frédéric Jouault (INRIA)** \
> February 2007

## Keywords

Tool Interoperability, Software Quality Control, Bug-Tracking, [Excel](https://office.microsoft.com/excel), [Bugzilla](https://www.bugzilla.org/), [Mantis](https://www.mantisbt.org/).

## Overview

Problems of tools interoperability can be found in various domains. Software quality control is one of these. This use case presents an implementation of bridges between different bug tracking tools like Bugzilla, and Mantis. We also consider that bug tracking information may be handled in a generic tool like Excel.

We take an example of "bug-tracking" in the case of a software product development. Assume that three teams are currently working on the same product at the same time but on different modules of this product. Teams may be geographically distributed, may have different levels of maturity of the used development process, may have different experience for the team members, and may consequently use different tools. The global situation may be described as follows:

  * Team A is developing the first module by using an Excel workbook with a specific format to track or trace bugs;

{{< figure src="img/ExcelSampleFile.png" alt="Excel workbook" width="800" >}}

&nbsp;

---

  * Team B is working on the second module and uses Bugzilla which is a free bug-tracking system;

{{< figure src="img/BugzillaSampleFile.png" alt="Bugzilla" width="800" >}}

&nbsp;

---

  * Team C is developing the third module and uses Mantis Bug Tracker which is another free bug tracking system;

{{< figure src="img/MantisSampleFile.png" alt="Mantis" width="800" >}}

&nbsp;

---

A fourth team (that we name Team D) must integrate the various modules developed by these three teams into a complete software solution. It also has to deal with all the bugs that have been detected but not yet resolved for each module.

The problem is that each team has used a different tool for keeping track of bugs. So in that case, how to succeed in centralizing bug-tracking, i.e. how to be able to interoperate from a tool to another without losing critical information about detected bugs? Furthermore the level of maturity of each team may dynamically evolve, each one learning from the global project. A given team may thus upgrade at some point in time its practices to those used by another one.

The general overview of our approach is presented in the following figure.

{{< figure src="img/modelEngineeringApproachSchema.png" caption="Overview of our model engineering approach to interoperability" >}}

In this approach, each different "bug-tracking" tool is described by a metamodel. Each tool's metamodel is linked to others by the "logical" pivot: transformations based on these metamodels to the pivot and from the pivot to the metamodels are implemented. This pivot is also a metamodel. It abstracts a certain number of general concepts about "bug-tracking".

Microsoft Excel, Bugzilla, and Mantis (and a lot of tools in general) do not natively use XMI (the OMG standard for serializing and exchanging models and metamodels). Instead they use a general XML format to import/export data. It is thus necessary to define an XML metamodel in order to be able to inject the content of XML files into models and to extract the content of these models into other XML files.

We use ATL to implement bridges between the different tools which are Microsoft Excel, Bugzilla and Mantis. Several bridges are possible and interesting to implement. We have experimented with "Excel-to-Bugzilla" and "Excel-to-Mantis" bridges for this use case. These bridges are implemented as chains of model transformations. The following figure presents both bridges.

{{< figure src="img/Excel2BugzillaAndmantisOverview.png" caption="\"Excel-to-Bugzilla\" and \"Excel-to-Mantis\" Bridges" >}}

In fact we do not implement direct bridges between these tools. We use the logical metamodel **SoftwareQualityControl** as a pivot and therefore every model used in one of the tools is transformed to an intermediary model conforming to the logical pivot. We can see that an Excel file in XML is the entry point of the two bridges. This file has to be injected into an XML model before being transformed into an Excel (SpreadsheetML) model and a SoftwareQualityControl model. Then, this Software-QualityControl model can be transformed into Bugzilla and Mantis models. Finally, these two models have to be transformed into XML models in order to be extracted into well-formed XML documents. These files are the exit points of the two bridges.

## Related Use Cases

MoDisco Use Case - Bugzilla Metrics

## References

  1. Bézivin, J, Bruneliere, H, Jouault, J, and Kurtev, I: Model Engineering Support for Tool Interoperability. In: Proceedings of the 4th Workshop in Software Model Engineering (WiSME 2005), Montego Bay, Jamaica.

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
