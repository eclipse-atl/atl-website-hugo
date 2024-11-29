---
title: "RSM to Topcased UML2 Editor"
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

# RSM to Topcased UML2 Editor

> **By Sébastien Gabel ([C-S](https://www.csgroup.eu/fr/)), Agusti Canals ([C-S](https://www.csgroup.eu/fr/)), Chistophe Le Camus ([C-S](https://www.csgroup.eu/fr/)), Freddy Allilaire (INRIA)** \
> June 2007

## Keywords

RSM, Topcased, Import, UML2, Class Diagram, Use Case Diagram, Sequence Diagram.

## Overview

TOPCASED currently uses the ATL model transformation toolkit. Model transformations have been mainly used in order to access models defined using other editors than TOPCASED one's.

This use case presents an operational application of ATL to bridge RSM and TOPCASED. It was implemented by [C-S](https://www.csgroup.eu/fr/)in the context of the TOPCASED project.

TOPCASED is an open-source workshop based on an Eclipse platform. Several editors are available: SAM, AADL, UML2, ECORE, and SYSML. It integrate several transformation services, in particular RSM to TOPCASED. These services are all based on ATL language and tool. Other services around models are available like OCL editor and checker, comparison, merging, etc.

In the TOPCASED UML2 Editor several diagrams are available:

  * Class diagram
  * Usecase diagram
  * Sequence diagram

{{< figure src="img/Topcased.png" caption="Topcased UML2 Editor" >}}

To display of diagram, the TOPCASED editor needs two kinds of files:

  * The model part (file with the UML2 extension)
  * The graphical information (file with the UML2DI extension)

In contrast with that, RSM file contains both model and graphical information. During the analysis, the border between these two sorts of information was determined.

The metamodel from a specific ROSE model is obtained by using the RSM plug-in provided by TOPCASED. This metamodel is required by the transformation. The figure below summarizes the transformation process:

{{< figure src="img/TransformationProcess.png" caption="Transformation Process" >}}

{{< figure src="img/UML2Import.png" >}}

### Import results for a Class Diagram from RSM to TOPCASED UML2 Editor:

{{< figure src="img/rsmClassDiagram.png" caption="RSM" >}}

{{< figure src="img/topcasedClassDiagram.png" caption="Topcased" >}}

### Import results for a Usecase Diagram from RSM to TOPCASED UML2 Editor:

{{< figure src="img/rsmUseCaseDiagram.png" caption="RSM" >}}

{{< figure src="img/topcasedUseCaseDiagram.png" caption="Topcased" >}}

### Import results for a Sequence Diagram from RSM to TOPCASED UML2 Editor:

{{< figure src="img/rsmSequenceDiagram.png" caption="RSM" >}}

{{< figure src="img/topcasedSequenceDiagram.png" caption="Topcased" >}}

## Related Use Cases

None at the current time.

## References

  1. Sébastien Gabel, Agusti Canals, Christophe Le Camus: An operational application of ATL to bridge RSM and TopCased. In: 2nd AMMA/ATL Workshop on Model Engineering (AWME2), Wednesday 3rd and Thursday 4th May, 2006 University of Nantes, Nantes France

##  Acknowledgement

The present work is being supported by the Topcased Project, the Usine Logicielle project of the System@tic Paris Region Cluster, and the OpenEmbeDD project.
