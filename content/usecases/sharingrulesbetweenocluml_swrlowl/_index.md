---
title: "Sharing Rules Between OCL/UML and SWRL/OWL"
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

# Sharing Rules Between OCL/UML and SWRL/OWL

> **By Milan Milanović (GOOD OLD AI Laboratory)** \
> March 2007

This work presents an implementation of sharing rules between two rule languages from different domains: OCL (Object Constraint Language) together with UML and SWRL (Semantic Web Rule Language) together with OWL. For this integration we used the R2ML (REWERSE I1 Rule Markup Language) metamodel as pivotal metamodel. The R2ML is a general Web rule markup language and it can represent different rule types: integrity, reaction, derivation and production.

This work has been done in collaboration between the GOOD OLD AI Laboratory at University of Belgrade, School of Interactive Arts and Technology at Simon Fraser University Surrey in Canada, School of Computing and Information Systems at Athabasca University in Canada and Chair of Internet Technology at Brandenburg University of Technology at Cottbus in Germany.

## Keywords

R2ML, [SWRL](https://www.w3.org/Submission/SWRL/), RDM, [OWL](https://www.w3.org/2004/OWL/), [OWL XML Syntax](https://www.w3.org/TR/owl-xmlsyntax/), [OCL](https://www.omg.org/cgi-bin/doc?formal/06-05-01), [UML](https://www.uml.org/), Ontology, Rules

## Overview

In this use case, we present rules interchange between the Semantic Web Rule Language along with the Web Ontology Language (SWRL/OWL) and the Object Constraint Language along with the UML (UML/OCL). The solution is based on the REWERSE I1 Rule Markup Language (R2ML), a MOF-defined general rule language, as a pivotal metamodel and the bidirectional transformations between SWRL/OWL and R2ML and between OCL/UML and R2ML. We use the Rule Definition Metamodel (RDM) as metamodel for the SWRL language, that is based on the Ontology Definition Metamodel (ODM).

**OCL** is a language that enables one to describe expressions and constraints on object-oriented (UML and MOF) models and other object modeling artifacts. An expression is an indication or specification of a value. A constraint is a restriction on one or more values of (part of) an object-oriented model or system. The OCL metamodel inherits the UML metamodel. The **UML** is the most used and known language to model application structure, behaviour and architecture but also business process and data structure. Since the standard specification of the OCL metamodel [1] does not contains support for OCL invariants, in our research, we introduced the **EnhancedOCL** package is defined in order to fill this gap. This package contains the **Invariant** class, as a subclass of the **OclModuleElement** class (see Figure 1). **OclModuleElement** represents a superclass for: OCL invariant elements (the **Invariant** class); OCL operations and properties, i.e., “def” elements (the abstract class **OclFeature**) that are represented with classes **OclOperation** and **OclProperty**, respectively; and OCL derivation rules, i.e., "derive" elements (**DeriveOclModuleElement**). **OclModuleElement** contains a definition of an invariant context that is represented with the **OclContextDefinition** class.

{{< figure src="1. EnhancedOCL package.jpg" caption="Figure 1. Elements of the EnhancedOCL package in the OCL metamodel" >}}

**SWRL** is a web rule language based on combination of the OWL DL and OWL Lite sublanguages of the OWL Web Ontology Language, with the Unary/Binary Datalog RuleML sublanguages of the Rule Markup Language (RuleML). SWRL is based on classical first order logic and its rules are of the form of an implication between an antecedent (body) and a consequent (head). The intended meaning can be read as "whenever the conditions specified in the antecedent hold, then the conditions specified in the consequent must also hold". Both the antecedent (body) and consequent (head) consist of zero or more atoms. Multiple atoms are connected with the conjuction operator. Rule Definition Metamodel (RDM) is a MOF-based meta-model for SWRL, and it is based on [2] (see Figure 2).

{{<figure src="2. RDM.jpg" caption="Figure 2. Main elements of the Rule Definiton Meta-model (RDM)" >}}

**R2ML** represents a general Web rule markup language that is defined by a metamodel that is specified by using the MOF metamodeling language, and it have also a XML-based concrete syntax that is defined with XML Schema. The R2ML metamodel [3] consists of overlapping metamodels for the following types of rules: integrity, derivation, reaction, and production rules. Furthermore, the R2ML XML schema, i.e., an R2ML concrete syntax, has been developed for encoding rules by domain experts. Although OCL can represent both integrity constraints and derivation rules, we only describe R2ML integrity rules here. An *integrity rule*, also known as *(integrity) constraint*, consists of a constraint assertion, which is a sentence in a logical language such as first-order predicate logic or OCL (see Figure 3). The R2ML framework supports two kinds of integrity rules: the *alethic* and *deontic* ones. An alethic integrity rule can be expressed by a phrase, such as *“it is necessarily the case that”* and a deontic one can be expressed by phrases, such as *“it is obligatory that”* or *“it should be the case that.”*

{{< figure src="3. IntegrityRule.jpg" caption="Figure 3. The metamodel of integrity rules" >}}

Implemented solution of transforming OCL invariants into the SWRL rules via R2ML rules consists of five transformation steps. The first one (see Figure 4) is between OCL rules (invariants) represented in the OCL concrete syntax (in the EBNF technical space) and models compliant with the OCL metamodel (in the MOF technical space). This is done by using the EBNF injection (ATL feature) of OCL rules, that is, by instantiating the MOF-based OCL metamodel (i.e., creating OCL models) and by using the OCL parser we created. Second, the MOF-based OCL rules obtained (OCL models) are transformed to R2ML models compliant with the R2ML metamodel. In the third step, R2ML models are transformed into the RDM models (i.e., instances of the SWRL metamodel) by using R2ML2RDM.atl transformation. In the fourth step, RDM models are transformed into the XML models (i.e., instances of the XML metamodel) by using transformations RDM2XML.atl transformation.

Five, such XML models (from the MOF technical space) are serialized into the SWRL XML format (complaint with the SWRL XML Schema) by using the ATL XML Extractor tool. All of these transformations are based on the conceptual mappings that we have defined.

{{< figure src="4. Complete transformation scenario.jpg" caption="Figure 4. The transformation scenario between the OCL and SWRL via R2ML" >}}

In addition, we have also defined transformations in opposite direction, so it is possible to translate SWRL rules into the OCL invariants via R2ML (remark: this side have ceratin constraints).

A UML model which contains a UML class (Customer) and has an OCL invariant defined on that class: if customer name is 'Jos senior' implies that is age is more than 21. is given in Figure 5. to serve as a running example for this use case.

{{< figure src="5. UML model.jpg" caption="Figure 5. OCL invariant and its corresponding UML class Customer" >}}

We first inject OCL code from Figure 5. into the OCL model by using the EBNF injector, (see Figure 4: EBNF injection), a part of the ATL toolkit, and the OCL Lexer and Parser. We generated the OCL Parser and Lexer by using the TCS (Textual Concrete Syntax), i.e., by defining TCS for the OCL. When we got an OCL model we then transform OCL metamodel elements into the R2ML metamodel elements (by using OCL2R2ML.atl transformations from Figure 4). As a result we get the R2ML model that can be serialized into the R2ML XML format (see Figure 6.). More details about this serialization process you can find in [4].

{{< figure src="6. R2MLRule.jpg" caption="Figure 6. An R2ML (alethic) integrity rule equivalent to the OCL invariant from Figure 5" >}}

In the next step we transform attained R2ML model into the RDM model (instance of SWRL metamodel) by using R2ML2RDM.atl transformation from Figure 4. Such RDM model can be serialized in the SWRL XML concrete syntax. In order to serialize the RDM model (from the MOF technical space) into the SWRL XML concrete syntax (i.e., to the XML technical space), we first need to use the RDM2XML.atl transformation (see Figure 4) to get an XML model from RDM model.

When we got a XML model which conforms to the MOF-based XML metamodel we can extract such model extraction from the MOF technical space to the XML technical space (XML extraction in Figure 4.) by using the XML extractor. A result of this transformations process for the RDM model attained in previous step is a SWRL rule in the SWRL XML concrete syntax (see Figure 7).

{{< figure src="7. SWRLRule.jpg" caption="Figure 7. SWRL rule of the transformed OCL invariant from Figure 5" >}}

This use case demonstrates how the AMMA tools can be used to share rules between different rule languages whose concrete syntaxes are defined in different technical spaces (i.e., in the XML, MOF and EBNF technical spaces). This ATL scenario provides a solution for bridging SWRL/OWL and OCL/UML is based on the pivotal (R2ML) metamodel that addresses the complexity of mappings between two rule languages, which contain many diverse concepts. More details about this scenario you can find in [5].

## Related Use Cases

None at the current time.

## References

  1. Object Constraint Language (OCL), OMG Specification, Version 2.0, formal/06-05-01, 2006.
  2. Brockmans, S., Haase, P., A Metamodel and UML Profile for Rule-extended OWL DL Ontologies - A Complete Reference, Universität Karlsruhe (TH) - Technical Report, 2006.
  3. R2ML (REWERSE I1 Rule Markup Language) metamodel in MOF/UML format.
  4. Milanović, M., Gašević, D., Giurca, A., Wagner, G., Lukichev, S., Devedžić, V., "Bridging Concrete and Abstract Syntax of Web Rule Languages", The First International Conference on Web Reasoning and Rule Systems (RR2007), Innsbruck, Austria, 2007.
  5. Milanović, M., Gašević, D., Giurca, A., Wagner, G., Devedžić, V., "Towards Sharing Rules Between OWL/SWRL and UML/OCL", Electronic Communications of the European Association of Software Science and Technology, Volume 5, 2006.

##  Download

  * [Complete scenario](../../atltransformations/#OCL2SWRL): Scenario available in the ATL transformation zoo (with source files).
  * [R2ML metamodel](https://www.eclipse.org/gmt/am3/zoos/atlanticZoo/#R2ML): R2ML metamodel is expressed in the KM3 textual format.

## Acknowledgement

The present work is being done in collaborative work with REWERSE I1 and LORNET Theme 1 projects.
