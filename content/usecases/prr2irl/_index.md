---
title: "Implementing two business rule languages: PRR and IRL"
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

# Implementing two business rule languages: PRR and IRL

> **By Freddy Allilaire, Mikael Barbero (INRIA), and Anas Abouzahra (ILOG)** \
> March 2007

This work presents a case study of implementing two business rule languages: Production Rule Representation (PRR) and ILOG Rule Language (IRL). We show how a pivot language can be translated into a concrete one with the help of model engineering. The outcome of this experiment also provides an interesting example of DSLs coordination. This work has been done in collaboration between the ATLAS Group in Nantes and ILOG.

## Keywords

[Business Rule](https://en.wikipedia.org/wiki/Business_rules), [PRR](https://www.omg.org/cgi-bin/doc?br/2003-9-3), IRL.

## Introduction

In this work, we report on the experiment of building flexible Domain Specific Languages (DSLs) framework upon model driven engineering techniques. More specifically, we are building a bridge between Production Rule Representation (PRR) and ILOG Rule Language (IRL) with the ATLAS Model Management Architecture (AMMA).

PRR is an object Management Architecture (OMG) standard designed within the Business Rule Working group, now part of the Business Modeling and Integration domain task force. It addresses the requirement for a common production rule representation, as used in various vendors' rules engines with normative considerations and high level modeling.

IRL is a formal rule language designed by ILOG with several implementations build on the top of very powerful and effective resolution engines.

## Overview

In this use case, AMMA and three of its core DSLs (KM3, ATL, and TCS) will be used. AMMA is built on a model-based vision of DSLs and provides a set of core DSLs that may be used to specify new DSLs.

PRR defines production rules for forward chaining, Rete-based inference and procedural processing. It also defines an interchangeable expression language for rule condition and actions expressions, so that they can be replaced by alternative representations for vendor-specific usage or in other standards. Finally, it defines rulesets as collections of rule for particular class of platform (procedural or inference rule engine).

{{< figure src="img/Code1.png" caption="Simple PRR program" >}}

The previous picture shows a simple PRR program. It says that for one shopping cart of a customer, there is at least one item in this shopping cart that is a best seller. The abstract syntax is specified in KM3. The following picture shows an excerpt of the PRR metamodel.

{{< figure src="img/Code2.png" caption="PRR Metamodel" >}}

As we can see on this picture showing the core PRR metamodel, it uses an abstract OCL-based syntax for PRR expressions.

Concrete syntax of PRR has been implemented in TCS. A grammar is automatically derived from both the KM3 metamodel and the TCS model to parse PRR programs into PRR models.

The ILOG Rule Lanaguage (IRL) is the core language of the ILOG rule engine. The IRL is an executable rule language and all business rules of different rule languages are translated into this language before parsing by the rule engine.

{{< figure src="img/Code3.png" caption="Simple IRL program" >}}

This figure shows the same rule as the previous one in PRR. It has exactly the same meaning but can be executed on the ILOG rule engine. As for PRR, the IRL abstract syntax is defined in KM3. The following figure is an excerpt of the IRL metamodel.

{{< figure src="img/Code4.png" caption="IRL Metamodel" >}}

Concrete syntax of IRL has been implemented in TCS. The TCS model is used to extract IRL models to IRL program.

The transformation between PRR and IRL provides an implementation of PRR semantics by translating PRR concepts into their IRL equivalent. The following figure provides an excerpt of this transformation:

{{< figure src="img/Code5.png" caption="ATL Transformation PRR2IRL Excerpt" >}}

The first two lines declares source and target models respectively conforming to PRR and IRL. Rule RuleSet transforms PRR RuleSet into IRL RuleSet while the rule Rule transform a PRR Rule into IRL RuleDefinition.

{{< figure src="img/prr2irl.png" caption="\"Implementing two business rule languages: PRR and IRL\" Use Case's Overview" >}}

The sample input PRR program Sample.prr injected into Sample-PRR conforming to PRR metamodel thanks to the generated parser from the PRR's TCS model. It is then transformed to Sample-IRL model conforming to IRL metamodel via an ATL transformation. The latter is then extracted into a IRL program Sample.irl using the TCS interpretation of the TCS syntax definition of IRL. This full transformation scenario is available in the ATL transformation zoo.

This case study illustrates how AMMA core DSLs can be used to capture different facets of a DSL. KM3 is used to express Domain Definition MetaModels. Concrete syntaxes are defined in TCS. Moreover, transformations from any DSLa to any DSLb can be implemented in ATL. This can, for instance, be used to implement the semantics of DSLa in terms of the semantics of DSLb (e.g. from PRR to IRL). Such a transformation may then be used to translate programs expressed in DSLa into programs expressed in DSLb. Another use of ATL is to implement concrete syntaxes of DSLs.

## Related Use Cases

None at the current time.

##  Download

{{< grid/div class="col-md-6" >}}
### Complete scenario
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
(This scenario will be available soon)
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [PRR Metamodel](https://www.eclipse.org/gmt/am3/zoos/atlanticZoo/#PRR%20\(Production%20Rule%20Representation\))
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
PRR metamodel is expressed in the KM3 textual format.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [IRL Metamodel](https://www.eclipse.org/gmt/am3/zoos/atlanticZoo/#IRL)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
IRL metamodel is expressed in the KM3 textual format.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

##  Acknowledgement

The present work is being supported by the FLFS ANRT project (Families of Language for Families of Systems), and the Usine Logicielle project of the System@tic Paris Region Cluster.
