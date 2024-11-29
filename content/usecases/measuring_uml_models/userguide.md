---
title: "Measuring UML models - User Guide"
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

# Measuring UML models - User Guide

> **By Freddy Allilaire (INRIA), Rémi Schnekenburger (CEA LIST)** \
> May 2007

This user guide explains how to configure and launch the Measuring UML models ATL service in Papyrus.

## User Guide

First step is to create a new transformation configuration, using the **Run As** button.

{{< figure src="../img/run.PNG" >}}

{{< figure src="../img/configurationManager.PNG" >}}

Thanks to the pop-up menu available on Papyrus transformation, you can create a new transformation configuration. This transformation configuration will contain all necessary parameters for your transformation.

{{< figure src="../img/newConfiguration.PNG" >}}

Thanks to the **Browse...** button in the Module group, the transformation module can be selected against all transformation modules available for Papyrus. In this use case, please select the **UML Measures** module.

{{< figure src="../img/moduleSelection.PNG" >}}

The next step is to choose the uml file on which the transformation will run. The following window filters the proposed files using their extensions; you can only select uml files.

{{< figure src="../img/sourceModelSelection.PNG" >}}

The next step is the selection of the target folder. It is not possible to select a project yet. In fact, Papyrus transformations must be run into a folder (yellow folder icons). This should be fixed in next versions of Papyrus tool. The selected folder will contain the results of the transformation.

{{< figure src="../img/targetFolderSelection.PNG" >}}

The following snapshot gives an example of what you should have just before launching the transformation. The transformation is launched using the **Run** button.

{{< figure src="../img/completeConfiguration.PNG" >}}

This transformation outputs 3 files: 1 html page with a table containing results, and 2 SVG files. These files are contained in the folder given in the configuration window.

  * **Tabular HTML** {{< figure src="../img/tabularHTML.PNG" >}}

&nbsp;

  * **SVG Bar Chart** {{< figure src="../img/barChart.PNG" >}}

&nbsp;

  * **SVG Pie Chart** {{< figure src="../img/pieChart.PNG" width="70%" >}}

##  Acknowledgement

The present work is being supported by the Usine Logicielle project of the System@tic Paris Region Cluster.
