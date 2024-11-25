---
title: "Visual Representation for Code Clone Tools"
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

# Visual Representation for Code Clone Tools

> **By Yu Sun, Frédéric Jouault** \
> December 2007

The aim of this project is to realize a uniform visual representation for different code clone detection tools. Different analysis results provided by different code clone detection tools can be injected into models. These models will be transformed to a generic Code Clone DSL model, and then into SVG model. Finally, the SVG code can be automatically extracted from SVG model.

## Keywords

[Code Clone](https://sel.ics.es.osaka-u.ac.jp/cdtools/index-e.html), [SVG](https://en.wikipedia.org/wiki/Scalable_Vector_Graphics), [XML](https://en.wikipedia.org/wiki/Xml).

## Overview

A number of code clone detection tools have been developed to aid the detection of code clones in sources files. However, most of the tools ouput the analysis results in different formats, and nearly all of them are based on text, which makes it difficult to compare and incorporate these results. In this work, we first difined specific DSLs for different code clone detection tools (Simian, SimScan, CloneDr) and a generic DSL for code clone. Then, specific DSL models can be transformed to the generic DSL for code clone, which will be continuely transformed to SVG model and finally generate the SVG code.

Code clone detection and SVG(two-dimensional graphics and graphical applications in XML) are the two main domains in this project.

In this use case, [AMMA](https://wiki.eclipse.org/AMMA) and three of its core DSLs: [KM3](https://wiki.eclipse.org/KM3), ATL, and [TCS](https://wiki.eclipse.org/TCS) will be used. AMMA is built on a model-based vision of DSLs. AMMA provides a set of core DSLs that may be used to specify new DSLs.

**Code Clone Detection** Tools can be used to analyze the source programs and find the same or similar parts in these programs. A text result is often generated after the analysis process, which reports the location of the code clones and other related information such as the length of clones, and similarity, etc. Three tools have been supported by our work. They are Simian, SimScan, and [CloneDr](http://www.semdesigns.com/Products/Clone/). The following is is an excerpt of the result outputed by Simian.

{{< figure src="simiansrc.PNG" caption="Code clone analysis result by Simian" >}}

The output contains some clone groups. In each group, the specific locations of the clones in each file are given. The abstract syntax is specified in KM3. The following figure is an excerpt of the Simian metamodel.

{{< figure src="simianmetamodel.PNG" caption="Simian metamodel excerpt" >}}

Concrete syntax of Simian has been implemented in TCS. A grammar is automatically derived from both the KM3 metamodel and the TCS model to parse Simian output file into Simian models.

**FileInfo DSL** is defined to record the total number of lines in each source file. This number is not available in the output result, but necessary for the visual representation. So we defined such a domain and make it as a part of the input together with Simian. As for Simian, the metamodel of FileInfo is defined by KM3, and the concrete syntax is defined by TCS.

{{< figure src="fileinfosrc.PNG" caption="FileInfo source excerpt" >}}

**Generic DSL for Code Clone** is the uniform model to which specific DSL models can be transformed. Most of the concepts in this DSL are very similiar with the ones in specific DSLs, because they are in the same domain. The following is an excerpt of the generic DSL metamodel.

{{< figure src="gdslmetamodel.PNG" caption="Generic DSL for code clone metamodel excerpt" >}}

A transformation from specific DSL model to generic DSL model can be implemented by Simian2CodeClone.atl.

{{< figure src="simian2codeclone.PNG" caption="Simian to CodeClone transformation excerpt, written in ATL" >}}

Then, after defining SVG and XML metamodels in KM3, a second transformation from generic Code Clone DSL to SVG can be completed.

{{< figure src="codeclone2svg.PNG" caption="Generic DSL for Code Clone to SVG transformation excerpt, written in ATL" >}}

Finally, the SVG model is transformed to XML model by SVG2XML.atl so that the SVG code can be extracted automatically. The following is an excerpt of the generated SVG code.

{{< figure src="svgcode.PNG" caption="Generated SVG code excerpt" >}}

And two kinds of visual representations are shown in the following.

{{< figure src="example.PNG" caption="Visual representation Form 1" >}}

{{< figure src="example2.PNG" caption="Visual representation Form 2" >}}

The following picture better demonstrates the full scenario of this project.

{{< figure src="fullscenario.PNG" caption="Full transformation scenario" width="70%" >}}

## Related Use Cases

None at the current time.

## References

  1. Kurtev, I, Bézivin, J, Jouault, F, and Valduriez, P : Model-based DSL Frameworks. In: Companion to the 21st Annual ACM SIGPLAN Conference on Object-Oriented Programming, Systems, Languages, and Applications, OOPSLA 2006, October 22-26, 2006, Portland, OR, USA. ACM, pages 602--616. 2006.
  2. Jouault, F, and Bézivin, J : KM3: a DSL for Metamodel Specification, In: Proceedings of 8th IFIP International Conference on Formal Methods for Open Object-Based Distributed Systems, LNCS 4037, Bologna, Italy, pages 171--185.
  3. Jouault, F, and Kurtev, I : Transforming Models with ATL, In: Proceedings of the Model Transformations in Practice Workshop at MoDELS 2005, Montego Bay, Jamaica.
  4. Jouault, F, Bézivin, J, and Kurtev, I : TCS: a DSL for the Specification of Textual Concrete Syntaxes in Model Engineering, In: GPCE'06: Proceedings of the fifth international conference on Generative programming and Component Engineering, Portland, Oregon, USA, pages 249--254. 2006.

##  Download

  * [Complete scenario](../../atltransformations/#CodeCloneTools2SVG): Scenario Code Clone to SVG available in the ATL transformation zoo (with source files).

## Acknowledgement

We want to thank my adviser [Dr. Jeff Gray](http://www.gray-area.org/). He offered the precious chance and great encouragement for us to do the research and project in this area. Also, we really appreciate our colleague Robert Tairas. He is doing his Ph.D research in the area of code clone, and he provided indispensable resources of code clone tools and related samples. The present work is being partially supported by the [OpenEmbeDD project](https://openembedd.inria.fr/).
