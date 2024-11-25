---
title: "Use Cases"
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

{{< header >}}

# ATL Use Cases

This section provides a set of ATL model transformation use cases covering different domains of application. These use cases are concrete examples of how model to model transformation (M2M) can be applied. Some of these use cases will be simple ones, some others will be more elaborated and will reuse basic use cases or parts of other ones.

A general description is given for each of these use cases, as well as some more precise documentations. For many of them, prototypes have already been implemented and are directly downloadable from this website.1

The general status of each of the provided use cases is indicated by one of the following icon:

{{< grid/div class="col-md-6" >}}
![Specification Only](../images/specification.png) **Specification Only**
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Partially Implemented](../images/implementation.png) **Partially Implemented**
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Reaching Completion](../images/completion.png) **Reaching Completion**
{{</ grid/div >}}

&nbsp;

---

## List of use cases

{{< grid/div class="col-md-6" >}}
### [DSLs coordination for Telephony](dslstelephony/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This work presents a case study of implementing two telephony languages: SPL and CPL. They are partially based on similar vocabularies. However they are very different and have been designed to be used by different people. The use case shows how M2M transformations may be used to map programs conforming to SPL or CPL at different abstraction levels.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Reaching Completion](../images/completion.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Model Adaptation](modeladaptation/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
The evolution of a metamodel may render its related terminal models invalid. This use case proposes a three-step solution that automatically adapts terminal models to their evolving metamodels. The main contribution is the precise detection of metamodel changes by using the AtlanMod Matching Language (AML), a DSL built on top of ATL and AMW. The running example is the Petrinet models.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Reaching Completion](../images/completion.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Models Validation through Petri nets](simplepdl2tina/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This work presents a use case of model transformation using ATL rules to validate MDD's models. This use case considers a simplified process description language, SimplePDL. It then presents a property-driven approach in which SimplePDL process models are translated into Petri nets. SimplePDL behavioral properties are expressed on corresponding Petri nets in LTL (Linear Temporal Logic). The Tina toolkit and, in particular, its model-checker, are used to validate process models by checking the expressed properties. This use case has been done by Benoit Combemale ([IRIT](http://www.irit.fr/)). This is a collaboration between [IRIT](http://www.irit.fr/) and [LAAS](http://www.laas.fr/) labs in Toulouse, France.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Reaching Completion](../images/completion.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Sharing Rules Between OCL/UML and SWRL/OWL](sharingrulesbetweenocluml_swrlowl/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This work presents an implementation of sharing rules between two rule languages from different domains: OCL (Object Constraint Language) together with UML and SWRL (Semantic Web Rule Language) together with OWL. For this integration we used the R2ML (REWERSE I1 Rule Markup Language) metamodel as pivotal metamodel. The R2ML is a general Web rule markup language and it can represent different rule types: integrity, reaction, derivation and production. This work has been done by [Milan Milanović](https://milan.milanovic.org/) in collaboration between the GOOD OLD AI Laboratory at University of Belgrade, [School of Interactive Arts and Technology](https://www.sfu.ca/siat) at [Simon Fraser University Surrey](https://www.surrey.sfu.ca/) in Canada and Chair of Internet Technology at Brandenburg University of Technology at Cottbus in Germany.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Reaching Completion](../images/completion.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Compiling a new formal verification language to LOTOS (ISO 8807)](fiacre2lotos/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
In this use case, we translate [FIACRE](https://www-sop.inria.fr/oasis/fiacre/) programs into LOTOS ([ISO 8807](https://www.iso.org/iso/iso_catalogue/catalogue_tc/catalogue_detail.htm?csnumber=16258)) programs, which can then be verified using the [CADP](http://www.inrialpes.fr/vasy/cadp/) toolbox. This work is the result of the cooperation of two INRIA teams: ATLAS (Nantes), and [VASY](http://www.inrialpes.fr/vasy/) (Grenoble), in the context of the [OpenEmbeDD](https://openembedd.inria.fr/) project.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Reaching Completion](../images/completion.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Models Measurement](modelsmeasurement/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case shows how to compute and generate measures on KM3 metamodels or UML2 models, and how to display them in different way (HTML, and SVG). This work has been done in collaboration between SODIUS and the ATLAS Group. As a complementary application to this contribution, an online service is provided at SODIUS's web site under the name "MC-Meter".
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Reaching Completion](../images/completion.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Modeling Web applications](webapp.modeling/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case shows how model weaving is used to help in the development of model transformations. In some cases, the gap between the input and output metamodels makes it difficult to develop a model transformation that works for every input model. In such cases a weaving model can be used to enrich the input model by **annotation**. This process can be thought of as a way to *parameterize* the model transformation.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Reaching Completion](../images/completion.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Visual Representation for Code Clone Tools](visualrepcodeclone/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
The aim of this use case is to realize a uniform visual representation for different code clone detection tools. Different analysis results provided by different code clone detection tools can be injected into models. These models will be transformed to a generic Code Clone DSL model, and then into SVG model. Finally, the SVG code can be automatically extracted from SVG model.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Reaching Completion](../images/completion.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Rational Rose to UML2 Tools](mdl2gmf/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case shows how we can reuse UML projects created with Rational Rose and import them in GMF (specifically in UML2 Tools) using ATL transformations. In this use case, we only support UML class diagrams. In practice, this use case was applied to the QVT metamodel available on the OMG site.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Reaching Completion](../images/completion.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Model Driven Performance Engineering: From UML/SPT to AnyLogic](uml2anylogic/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case presents a transformation from annotated UML activity diagrams to AnyLogic simulation models. The actions and control flows in activity diagrams are annotated with performance information utilizing the UML profile for schedulability, performance, and timing (SPT). This information is used to generate a simulation model that can be executed by the AnyLogic simulation tool from XJ Technologies. Such simulations can help to identify performance issues early in a software design process. This use case has been done by [Jendrik Johannes](https://onepiece.software/) ([TU Dresden](https://tu-dresden.de/)) and its development has been supported by the IST European MODELPLEX project (MODELing solution for comPLEX software systems, FP6-IP 34081).
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Reaching Completion](../images/completion.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Production of UML class diagrams from syntactical models of english text or SBVR models](syntax2sbvr2uml/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This work presents a case study of obtaining a UML class diagram from a syntactical analysis of a text using SBVR as an intermediate layer. We show how it is possible, with the help of model engineering, to realize two transformations: from a syntactical model into a SBVR model, and from a SBVR model into a UML model. This work has been done in collaboration between the ATLANMOD team in Nantes and the ILOG company.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Reaching Completion](../images/completion.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [QVT to ATL Virtual Machine Compiler](qvt2atlvm/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This work provides a QVT compiler that targets the ATL Virtual Machine (ATL VM), and thus provides executability of QVT programs on top of the ATL VM. The code generator is written in the ACG (Atl Code Generation) Domain-Specific Language (DSL). It takes as input a QVT model (typically in XMI format) that may have been created by a QVT front-end (i.e., a parser and type checker) like [Eclipse/modeling/mmt/Procedural QVT](https://eclipse.dev/mmt/?project=qvto#qvto), or SmartQVT. The output of the code generator is a ".asm" file similar to the ones generated by the ATL compiler, or the ACG compiler (both also written in ACG).
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Partially Implemented](../images/implementation.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [A Metamodel Independent Approach to Difference Representation](mmindapproachtodiffrep/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This work presents an ATL implementation of a metamodel independent approach to the representation of model differences which is agnostic of the calculation method. Given two models being differenced which conform to a metamodel, their difference is conforming to another metamodel derived from the former by an automated transformation. Interestingly, difference models are first-class artifacts which in turn induce other transformations, such that they can be applied to one of the differenced models to automatically obtain the other one. This work has been done by Antonio Cicchetti, Davide Di Ruscio and Alfonso Pierantonio (Università dell'Aquila).
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Partially Implemented](../images/implementation.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Software Quality Control Tools Interoperability (Bugzilla, Mantis, Excel)](softwarequalitycontroltoolsinteroperability/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
Problems of tools interoperability can be found in various domains. Software quality control is one of these. This use case presents an implementation of bridges between different bug tracking tools like Bugzilla, and Mantis. We also consider that bug tracking information may be handled in a generic tool like Excel.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Partially Implemented](../images/implementation.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Software Build Tools Interoperability (Make, Ant, Maven)](bridgebetweenbuildtools/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
Make is one of the most common build tool. It remains widely used but essentially in Unix-based platforms. Many problems have surfaced with scaling Make to work with modern, large software projects. So, it is interesting to provide some bridges from Make to other build tools like Ant (which is popular for Java development and uses an XML file format) and Maven (a Java tool for management project and automated software build).
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Partially Implemented](../images/implementation.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Web Syndication Interoperability (RSS and Atom)](websyndicationinteroperability/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
People who generate web syndication feeds have a choice of formats. Today, the two most likely candidates are RSS 2.0 and Atom 1.0. The goal of this case study is to provide a bridge between both formats by using a light and flexible interoperability solution.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Partially Implemented](../images/implementation.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [ODM Implementation (Bridging UML and OWL)]()
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case presents an implemented solution to the OMG Ontology Definition Metamodel (ODM) specification. ODM offers a set of metamodels and mappings for bridging the metamodeling world and the ontologies. The present solution supports the UML 2.0 metamodel and the OWL metamodel as defined in ODM. This work is made by the SIDo Group from the L3I lab in La Rochelle.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Partially Implemented](../images/implementation.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Implementing two business rule languages: PRR and IRL]()
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This work presents a case study of implementing two business rule languages: Production Rule Representation (PRR) and ILOG Rule Language (IRL). We show how a pivot language can be translated into a concrete one with the help of model engineering. The outcome of this experiment also provides an interesting example of DSLs coordination. This work has been done in collaboration between the ATLAS Group in Nantes and ILOG. A web service PRR to IRL is available here: http://www.sciences.univ-nantes.fr/lina/atl/atldemo/prronline/.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Partially Implemented](../images/implementation.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [From Hoare's Monitors to Dijkstra's Semaphores]()
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This is a classic in synchronization. We propose an automatic translation from Hoare's monitors as defined in [1] into Dijkstra's semaphores as initially introduced in [2]. The ATL transformation code follows the rules given in [1]. A complete reprint of this paper is available at: http://www.acm.org/classics/feb96/.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Partially Implemented](../images/implementation.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [From UML Activity Diagram to Project Management Software]()
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case shows the possibility to have interoperability between an UML activity diagram and a project management software like MsProject. UML Activity Diagrams are typically used for business process modeling, for modeling the logic captured by a single use case or usage scenario, or for modeling the detailed logic of a business rule. Microsoft Project is a project management software program developed by Microsoft.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Partially Implemented](../images/implementation.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Using a UML modeler to generate metamodels]()
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case shows how to use and integrate a model transformation service in a UML Modeler to generate metamodels conforming to KM3, MOF 1.4, and Ecore. The used UML Modeler is Papyrus (CEA LIST).
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Specification Only](../images/specification.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Measuring UML models](measuring_uml_models/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case shows how to use and integrate a model transformation service in a UML Modeler to compute and generate quality measures on UML models. The used UML Modeler is [Papyrus](https://eclipse.dev/papyrus/) ([CEA LIST](https://list.cea.fr/)).
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Specification Only](../images/specification.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Verifying UML profiled models]()
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case shows how to use and integrate a model transformation service in a UML Modeler to verify a UML profiled model. The used UML Modeler is Papyrus (CEA LIST).
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Specification Only](../images/specification.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [RSM to Topcased UML2 Editor]()
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
TOPCASED currently relies on the ATL model transformation toolkit. Model transformations have been mainly used in order to access models defined using other editors than TOPCASED one's. This use case presents an operational application of ATL to bridge RSM and TOPCASED.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Specification Only](../images/specification.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Sildex to Topcased SAM]()
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case presents the import of SILDEX models (a synchronous language based graphical modelling formalism developed by TNI and currently in use at AIRBUS) in the TOPCASED SAM modelling language. SAM represents the new TOPCASED business metamodel for functional and automaton parts of SILDEX. This use case was implemented by C-S in the context of the TOPCASED project.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Specification Only](../images/specification.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Sildex to Topcased AADL/COTRE]()
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case presents the import of SILDEX models (a synchronous language based graphical modelling formalism developed by TNI and currently in use at AIRBUS) in AADL/COTRE. It was implemented by C-S in the context of the TOPCASED project.
{{</ grid/div >}}
{{< grid/div class="col-md-6" >}}
![Specification Only](../images/specification.png)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

&nbsp;

## Latest changes
