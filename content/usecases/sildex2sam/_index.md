---
title: "Sildex to Topcased SAM"
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

# Sildex to Topcased SAM

> **By Agusti Canals ([C-S](https://www.csgroup.eu/fr/)), Chistophe Le Camus ([C-S](https://www.csgroup.eu/fr/)), Freddy Allilaire (INRIA)** \
> June 2007

## Keywords

TOPCASED, SAM, SILDEX, SIGNAL.

## Overview

This use case presents the import of SILDEX models (a synchronous language based graphical modelling formalism developed by TNI and currently in use at [AIRBUS](https://www.airbus.com/en/)) in the TOPCASED SAM modelling language. It was implemented in ATL by [C-S](https://www.csgroup.eu/fr/) in the context of the TOPCASED project.

SILDEX is a CASE tool supporting SIGNAL synchronous languages. It provides graphical and SIGNAL code editing of each process and relevant dataflow; formal proof with "synchronous compilation"; dynamic simulation; ADA, C and FORTRAN code generation, and documentation production. SILDEX was designed and tested in Smalltalk, then translated into C code with TNI's OpenTalk compiler. SILDEX targets critical real-time software developments.

TOPCASED is an open-source workshop based on an Eclipse platform. Several editors are available: SAM, AADL, UML2, ECORE, and SYSML. It integrate several transformation services. These services are based on ATL language and toolkit. Model transformations have been mainly used in order to access models defined using other editors than TOPCASED one's. Other services around models are available like OCL editor and checker, comparison, merging, etc.

TOPCASED-SAM is a subproject of the TOPCASED project. This subproject provides a set of modeling, transforming and verifying tools for functional structured analysis.

A metamodel for SILDEX defining all the concepts that can be handled in TOPCASED SAM formalism has been defined. The SILDEX example below illustrates the communication of two sub-systems named "Producer" and "Consumer" via data flows and control flows connected on ports (not visible on the sub system "Consumer").

{{< figure src="img/example.PNG" caption="An example of communication between two sub-systems" >}}

This example illustrates the following notions: System, Data flows prefixed by FD_, Control flows prefixed by FC_, Ports that we specialised depending on their nature and their direction. To precise some relations, a system can contain sub systems, and a flow is linked by ports. The confrontation of the analysis of other examples allowed to extend the SAM metamodel whose simplified view is proposed in the following figure.

{{< figure src="img/MMSAM.PNG" caption="A simplified view of the SAM metamodel" >}}

SAM represents the new TOPCASED business metamodel for functional and automaton parts of SILDEX.

After the creation of the source metamodel SILDEX and the target metamodel SAM, the TOPCASED process to make a transformation can be breakdown as follow:

  * first, the mapping of the concepts,
  * then the writing of the ATL transformation rules and the automatic transformation by rule execution (also with ATL),
  * at last, manual check of the result through the reading of the files obtained by the editors (in this use case TOPCASED SAM Editor).

{{< figure src="img/atlRules.PNG" caption="Excerpt of the ATL transformation: Sildex to SAM" >}}

Today the TOPCASED service to transform SILDEX models to SAM models is operational and used by AIRBUS France. More information on this work can be found in [1].

{{< figure src="img/SAMEditor.PNG" caption="Screenshot of SAM Editor" >}}

## Related Use Cases

None at the current time.

## References

  1. Canals, A.; Le Camus, C.; Feau, M.; et al.: An Operational Use of ATL: Integration of Model and Meta Model Transformations in the TOPCASED Project. In: DASIA 2006 - Data Systems in Aerospace, Proceedings of the conference held 22-25 May, 2006 in Berlin, Germany. Edited by L. Ouwehand. ESA SP-630. European Space Agency, 2006. Published on CDROM., p.40.1
  2. Patrick Farail, Pierre Gaufillet, Agusti Canals, Christophe Le Camus, David Sciamma, Pierre Michel, Xavier Crégut, Marc Pantel: The TOPCASED project: a Toolkit in Open source for Critical Aeronautic SystEms Design. In: Proceedings of the Eclipse Technology eXchange workshop (eTX) at ECOOP 2006.

##  Acknowledgement

The present work is being supported by the Topcased Project, the Usine Logicielle project of the System@tic Paris Region Cluster, and the OpenEmbeDD project.
