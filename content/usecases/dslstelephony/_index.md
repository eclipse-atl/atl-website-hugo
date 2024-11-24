---
title: "DSLs coordination for Telephony"
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

# DSLs coordination for Telephony

> **By Freddy Allilaire and Frédéric Jouault (INRIA)** \
> February 2007

This work presents a case study of implementing two telephony languages: SPL and CPL. We show how it is possible to transform programs of one language into the other one with the help of model engineering. This work has been done in collaboration between ATLAS Group in Nantes and the PHOENIX Group in Bordeaux.

## Keywords

Telephony, [SIP](http://www.ietf.org/rfc/rfc3261.txt), [CPL](http://www.faqs.org/rfcs/rfc3880.html), [SPL](http://phoenix.labri.fr/software/spl/).

## Overview

In this work, we report on an experiment consisting of the implementation of two languages specific to the domain of internet telephony. The first one is SPL (Session Processing Language), and the second one is CPL (Call Processing Language). The outcome of this experiment provides an interesting example of DSL coordination. Three aspects of each DSL are taken into account: abstract syntax, concrete syntax, and dynamic semantics. Moreover, our case study allows for different approaches to be illustrated. SPL has a textual concrete syntax whereas CPL is XMLbased. Additionally, both languages being in the same domain, one can be defined using the other.

SPL and CPL are both in the application area of telephony. They are partially based on similar vocabularies. However they are very different and have been designed to be used by different people.

In this use case, AMMA and three of its core DSLs: KM3, ATL, and TCS will be used. AMMA is built on a model-based vision of DSLs. AMMA provides a set of core DSLs that may be used to specify new DSLs.

**SPL** (Session Processing Language) programs are used to control telephony agents (e.g. clients, proxies) implementing the SIP (Session Initiation Protocol) protocol. SIP concepts are directly available in the language. Consequently, SPL programs are able to concisely and simply express any telephony service. Additionally, SPL is capable of guaranteeing critical properties that could not be verified with a GPL. SPL programs run on a Service Logic Execution Environment for SIP.

{{< figure src="SimpleSPLProgram.png" caption="Simple SPL program: forwarding a call" >}}

Every incoming call is redirected to SIP address sip:phoenix@barbade.enseirb.fr. The target address is declared on line 3. Lines 6-8 correspond to the definition of the action to perform on incoming calls. The return statement at line 7 forwards the call. The abstract syntax is specified in KM3. The following figure is an excerpt of the SPL metamodel.

{{< figure src="SPLMetamodel.png" caption="SPL metamodel excerpt" >}}

Concrete syntax of SPL has been implemented in TCS. A grammar is automatically derived from both the KM3 metamodel and the TCS model to parse SPL programs into SPL models.

**CPL** (Call Processing Language) is a standard scripting language for the SIP protocol. It offers a limited set of language constructs. CPL is supposed to be simple enough so that it is safe to execute untrusted scripts on public servers. The following figure gives a CPL example, which is equivalent to the SPL example given.

{{< figure src="SimpleCPLScript.png" caption="Simple CPL script: forwarding a call" >}}

As for SPL, the abstract syntax of CPL is specified in KM3. The following figure is an excerpt of the CPL metamodel.

{{< figure src="CPLMetamodel.png" caption="CPL metamodel excerpt" >}}

Both CPL concrete syntax and semantics are handled by model transformations in ATL. CPL concrete syntax is XML-based. TCS is therefore not really useful here. The solution we implemented is the following. We use a generic XML parser to go from the XML document to an XML model conforming to an XML metamodel. This has an extremely low cost since these XML parser and metamodel are provided as part of AMMA. In a second step, we transform our XML model into a CPL model using ATL. The following figure gives an excerpt of this XML2CPL transformation. It transforms an XML model into a CPL model (line 2) by using a library of XML helpers (line 4) providing the getElemsByNames operation on XML elements. A single rule is shown: rule CPL (lines 6-17), which transforms the root of the XML document into a CPL element. Nested incoming element is attached to this root (lines 13-15).

{{< figure src="XML2CPL.png" caption="XML to CPL transformation excerpt, written in ATL" >}}

A second transformation (CPL2SPL) provides an implementation of CPL semantics by translating CPL concepts into their SPL equivalent concepts. The following figure provides an excerpt of this transformation. Line 2 declares source and target models respectively conforming to CPL and SPL. Rule CPL2Program (lines 4- 19) transforms the root CPL element (lines 5-6) into an SPL program (lines 8-10), an unnamed service (lines 11-15) and a dialog (lines 16-18).

{{< figure src="CPL2SPL.png" caption="CPL to SPL transformation excerpt, written in ATL" >}}

The CPL script Sample.cpl conforming to the CPL schema is first translated into an XML model conforming to an XML metamodel. Then it is transformed into a CPL model by XML2CPL.atl. The core transformation CPL2SPL.atl is then applied to generate an SPL model. The latter is then serialized into an SPL program using the TCS interpreter on the TCS syntax definition of SPL. This full transformation scenario (called CPL2SPL) is available in the ATL transformation zoo.

{{< figure src="CPL2SPL-fullScenario.png" caption="Full CPL to SPL transformation scenario" width="65%" >}}

This case study illustrates how AMMA core DSLs can be used to capture different facets of a DSL. KM3 is used to express Domain Definition MetaModels. Concrete syntaxes are defined in TCS. Dynamic semantics can be formally defined in ASM, which we have done for ATL and SPL. Moreover, transformations from any DSLa to any DSLb can be implemented in ATL. This can, for instance, be used to implement the semantics of DSLa in terms of the semantics of DSLb (e.g. from CPL to SPL, see section 4.3). Such a transformation may then be used to translate programs expressed in DSLa into programs expressed in DSLb. Another use of ATL is to implement concrete syntaxes of DSLs.

## Related Use Cases

None at the current time.

## References

  1. Jouault, F, Bézivin, J, Consel, C, Kurtev, I, and Latry, F: [Building DSLs with AMMA/ATL, a Case Study on SPL and CPL Telephony Languages](http://www.sciences.univ-nantes.fr/lina/atl/bibliography/DSPD06). In: Proceedings of the 1st ECOOP Workshop on Domain-Specific Program Development (DSPD), July 3rd, Nantes, France. 2006.
  2. Jouault, F: [Contribution à l'étude des langages de transformation de modèles](http://www.sciences.univ-nantes.fr/lina/atl/bibliography/Jouault06), Phd thesis, Université de Nantes. 2006.

##  Download

  * [Complete scenario](../../atltransformations/#CPL2SPL): Scenario CPL to SPL available in the ATL transformation zoo (with source files).
  * [CPL metamodel](https://www.eclipse.org/gmt/am3/zoos/atlanticZoo/#CPL): Full CPL metamodel specified in KM3.
  * [SPL metamodel](http://www.eclipse.org/gmt/am3/zoos/atlanticZoo/#SPL): Full SPL metamodel specified in KM3.

## Acknowledgement

The present work is being supported by the ModelPlex european project, the FLFS ANRT project (Families of Language for Families of Systems), the OpenEmbeDD project, and the Usine Logicielle project of the System@tic Paris Region Cluster.
