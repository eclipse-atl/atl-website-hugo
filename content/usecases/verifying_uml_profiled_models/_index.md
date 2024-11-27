---
title: "Verifying UML profiled models"
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

# Verifying UML profiled models

> **By Freddy Allilaire (INRIA), Rémi Schnekenburger (CEA LIST)** \
> May 2007

This use case shows how to integrate a model transformation service in a UML Modeler to verify a UML profiled model.

## Keywords

UML Modeler, [UML 2](https://www.eclipse.org/modeling/mdt/?project=uml2), UML Profile, Verification, Naming convention, Error reporting.

## Overview

[Papyrus](https://eclipse.dev/papyrus/) is a dedicated tool for UML2 graphical modelling mainly developed by CEA LIST. It integrates the ATL engine. This use case shows how the coupling of ATL and Papyrus may allow to verify UML profiled models.

In the context of this use case, a sample UML profile and a sample UML model applying this profile have been modeled with Papyrus. For this UML profiled model, we provide a service that will check if the UML model complies to some conventions. The conventions are defined by the ATL transformation "SampleUMLProfile to Problem". The figures below present the profile and the UML model used here:

{{< figure src="img/sampleProfile.PNG" caption="Sample profile" >}}

{{< figure src="img/sampleModel.PNG" caption="Sample UML model using the Sample profile" >}}

For all the models using the sample profile, we want to check some properties (e.g. naming convention). To do this, we will define an ATL model transformation to check these conventions associated to the Sample profile. If an element of a UML model does not respect a convention, a problem element (e.g. warning, error) will be created. For example, if we want to forbid the value "value1" for the property "myProperty" this could be done by the following ATL code:

{{< figure src="img/rule1.PNG" >}}

The following ATL rule will verify if all the classes with stereotype MyStereotype have a name starting by 'Sample_'. If not, a warning problem will be created with the following text "Class name should start with Sample_ to respect sample convention".

{{< figure src="img/rule2.PNG" >}}

To see how to configure and run the "Verification UML Profiled Model" ATL service, please take a look to the [User Guide](userguide/).

This resulting model contains all the problems of the UML model. So, if this model is not empty (i.e. there are problems in the UML model) the problems will be displayed in the Eclipse Problems view.

{{< figure src="img/errorsReporting.PNG" caption="Result of error reporting" width="80%" >}}

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

{{< grid/div class="col-md-6" >}}
### [Sample Project](SampleProject4Verification.zip)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
Sample project with a UML profile and a UML model applying this profile to test the implementation of this use case in Papyrus.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

##  Acknowledgement

The present work is being supported by the Usine Logicielle project of the System@tic Paris Region Cluster.

## Latest changes
