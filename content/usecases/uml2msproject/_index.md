---
title: "From UML Activity Diagram to Project Management Software"
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

# From UML Activity Diagram to Project Management Software

> **By Freddy Allilaire (INRIA)** \
> March 2007

This use case shows how to translate between UML Activity Diagrams and MSProject. All transformations code in ATL and metamodels code in KM3 is available from the [zoos](https://www.eclipse.org/gmt/am3/zoos/).

## Keywords

[UML Activity Diagrams](https://www.agilemodeling.com/artifacts/activityDiagram.htm), [MsProject](https://office.microsoft.com/project), [Project Management Software](https://en.wikipedia.org/wiki/Project_management_software).

## Overview

This use case shows the possibility to have interoperability between an UML activity diagram and a project management software like MsProject.

UML Activity Diagrams are typically used for business process modeling, for modeling the logic captured by a single use case or usage scenario, or for modeling the detailed logic of a business rule. Although UML activity diagrams could potentially model the internal logic of a complex operation it would be far better to simply rewrite the operation so that it is simple enough that you don't require an activity diagram. In many ways UML activity diagrams are the object-oriented equivalent of flow charts and data flow diagrams (DFDs) from structured development.

Project management software is a term covering many types of software, including scheduling, resource allocation, collaboration software, communication and documentation systems, which are used to deal with the complexity of large projects. One of the most common tasks is to schedule a series of events, and the complexity of this task can vary considerably depending on how the tool is used.

Microsoft Project is a project management software program developed by Microsoft which is designed to assist project managers in developing plans, assigning resources to tasks, tracking progress, managing budgets and analyzing workloads.

The aim of this case study is to generate an MSProject project from a UML Activity Diagram. The overall approach is summarized in the following figure:

{{< figure src="img/UseCaseOverview.png" caption="\"From UML Activity Diagram to Project Management Software\" Use Case's Overview" >}}

The XML extraction phase was done by using XML projector available from the AM3 and ATL toolkit. The Model-to-Model transformation phase was implemented by using ATL model-to-model transformations. Metamodels was created by using KM3 syntax and toolkit. All the metamodels mentioned in the previous schema (and so used within this use case) are available at the [Download section](#download).

We provide below a set of screenshots showing the different input/output files provided/created with this use case:

{{< figure src="img/Sample.png" caption="Screenshots of the input/outputs of the use case" >}}

## Related Use Cases

None at the current time.

## References

  1. Hoare, C.A.R Monitors: An Operating System Structuring Concept Communications of the ACM, Vol. 17, No. 10. October 1974, pp. 549-557
  2. Dijkstra, E. W. Cooperating Sequential Processes. In programming Languages (Ed. F. Genuys), Academic Press, New York.

##  Download

{{< grid/div class="col-md-6" >}}
### [Complete scenario](../../atltransformations/#UMLActivityDiagram2MSProject)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
Scenario available in the ATL transformation zoo (with source files).
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [UML Metamodel](https://www.eclipse.org/gmt/am3/zoos/atlantMOF_MDRZoo/#UMLDI)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
UML metamodel in MDR XMI 1.2, conforming to MOF 1.4.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [MsProject Metamodel](https://www.eclipse.org/gmt/am3/zoos/atlanticZoo/#MSProject)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
MsProject metamodel is expressed in the KM3 textual format.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

##  Acknowledgement

The present work is being supported by the Usine Logicielle project of the System@tic Paris Region Cluster.
