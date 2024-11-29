---
title: "Sildex to Topcased AADL/COTRE"
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

# Sildex to Topcased AADL/COTRE

> **By Agusti Canals ([C-S](https://www.csgroup.eu/fr/)), Chistophe Le Camus ([C-S](https://www.csgroup.eu/fr/)), Freddy Allilaire (INRIA)** \
> June 2007

## Keywords

TOPCASED, SILDEX, SIGNAL, AADL.

## Overview

This use case presents the import of SILDEX models (a synchronous language based graphical modelling formalism developed by TNI and currently in use at [AIRBUS](https://www.airbus.com/en/)) in AADL/COTRE. It was implemented in ATL by [C-S](https://www.csgroup.eu/fr/) in the context of the TOPCASED project.

SILDEX is a CASE tool supporting SIGNAL synchronous languages. It provides graphical and SIGNAL code editing of each process and relevant dataflow; formal proof with "synchronous compilation"; dynamic simulation; ADA, C and FORTRAN code generation, and documentation production. SILDEX was designed and tested in Smalltalk, then translated into C code with TNI's OpenTalk compiler. SILDEX targets critical real-time software developments.

TOPCASED is an open-source workshop based on an Eclipse platform. Several editors are available: SAM, AADL, UML2, ECORE, and SYSML. It integrate several transformation services. These services are based on ATL language and toolkit. Model transformations have been mainly used in order to access models defined using other editors than TOPCASED one's. Other services around models are available like OCL editor and checker, comparison, merging, etc.

TOPCASED-AADL is a subproject of the TOPCASED project. This subproject provides a set of modeling, transforming and verifying tools around AADL (Architecture Analysis and Design Language). These tools are based on the AADL metamodel that has been developped by the SEI for the [OSATE](https://www.aadl.info/) project. AADL/COTRE is a language (including AADL) resulting from the COTRE project.

From the YACC grammar of AADL/COTRE, a metamodel has been defined. The following example shows an excerpt of the available grammar:

{{< figure src="img/sampleAADL.PNG" >}}

This metamodeling process implies an iterative approach revealing new reductions with each iteration. The following example shows the result of the metamodeling process:

{{< figure src="img/sampleAADL2.PNG" >}}

{{< figure src="img/sampleAADL2_model.PNG" >}}

After the creation of the source metamodel SILDEX and the target metamodel AADL/COTRE, the TOPCASED process to make a transformation can be breakdown as follow:

  * first, the mapping of the concepts,
  * then the writing of the ATL transformation rules and the automatic transformation by rule execution (also with ATL),
  * at last, manual check of the result through the reading of the files obtained by the editors (in this use case TOPCASED AADL Editor).

{{< figure src="img/atlRules.PNG" caption="Excerpt of the ATL transformation: Sildex to AADL" >}}

Today the TOPCASED service to transform SILDEX models to AADL models is operational and used by the TOPCASED Project.

{{< figure src="img/AADLEditor.PNG" caption="Screenshot of AADL Editor" >}}

## Related Use Cases

None at the current time.

## References

  1. Canals, A.; Le Camus, C.; Feau, M.; et al.: An Operational Use of ATL: Integration of Model and Meta Model Transformations in the TOPCASED Project. In: DASIA 2006 - Data Systems in Aerospace, Proceedings of the conference held 22-25 May, 2006 in Berlin, Germany. Edited by L. Ouwehand. ESA SP-630. European Space Agency, 2006. Published on CDROM., p.40.1
  2. Patrick Farail, Pierre Gaufillet, Agusti Canals, Christophe Le Camus, David Sciamma, Pierre Michel, Xavier Crégut, Marc Pantel: The TOPCASED project: a Toolkit in Open source for Critical Aeronautic SystEms Design. In: Proceedings of the Eclipse Technology eXchange workshop (eTX) at ECOOP 2006.

##  Acknowledgement

The present work is being supported by the Topcased Project, the Usine Logicielle project of the System@tic Paris Region Cluster, and the OpenEmbeDD project.
