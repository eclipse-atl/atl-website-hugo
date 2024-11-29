---
title: "ODM Implementation (Bridging UML and OWL)"
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

# ODM Implementation (Bridging UML and OWL)

> **By [Guillaume Hillairet](mailto:g<dot>hillairet<at>gmail<dot>com) (L3I)** \
> February 2007

This work presents an implementation of the OMG ODM (Ontology Definition Metamodel) proposal using the ATL language. This work is made by the SIDo Group from the L3I lab in La Rochelle.

## Keywords

Ontology, [UML 2.0](https://www.uml.org/), [OWL](https://www.w3.org/2004/OWL), [ODM](https://www.omg.org/ontology), [Protégé](https://protege.stanford.edu/), [EODM](https://www.eclipse.org/modeling/mdt/?project=eodm).

## Overview

This use case presents an implemented solution to the OMG Ontology Definition Metamodel (ODM) specification. ODM offers a set of metamodels and mappings for bridging the metamodeling world and the ontologies. The present solution supports the UML 2.0 metamodel and the OWL metamodel as defined in ODM.

The ODM is a recently adopted standard from the Object Management Group that supports ontology development and conceptual modeling in several standard representation languages. It provides a coherent framework for ontology creation based on MOF (Meta Object Facility) and UML (Unified Modeling Language). In this way it plays a central role for bridging Model Driven Architecture based standards and Semantic Web technologies.

{{< figure src="img/UMLOWLBridge.png" caption="ODM Overview" >}}

**ODM** defines five metamodels (RDFS, OWL, Topic Maps, Common Logic and Description Logic), two UML Profiles (RDFS/OWL Profile, Topic Maps Profile) and a set of QVT mappings from UML to OWL, Topic Maps to OWL and RDFS/OWL to Common Logic. At this current time, we have implemented two of these metamodels, RDFS and OWL in KM3 and the UML Profile for RDFS/OWL. We have also implemented the mapping between UML and OWL by using ATL.

**UML** is the most used and known language to model application structure, behaviour and architecture but also business process and data structure. UML is an OMG specification currently in version 2.0. The UML metamodel used in this case study is the one available under the UML eclipse project (eclipse.org/uml2). By using this metamodel we insure that models used by our transformation can be created by different UML tools supporting current UML 2.0 specification.

**OWL** (Web Ontology language) is the most expressive language for representing and sharing ontologies over the Web. OWL is designed for use by applications that need to process the content of information instead of just presenting information. It facilitates greater machine interoperability of Web content than other description languages like XML, RDF and RDF-S by providing additional vocabulary along with a formal semantics.

The OWL metamodel is implemented in by extending the RDFS metamodel. The figure below shows an excerpt of the class hierarchy present in OWL. An OWL Class is a kind of RDFS Class, like OWL Property are kind of RDF Property. OWL offers a richer semantic to express ontologies. With it we can define cardinalities on properties, defined classes with set operators like union, intersection, complement, etc. The notion of Individual in OWL is used to represent resources, i.e. class instances. Each element is identified by a unique URI identifier.

{{< figure src="img/OWL.png" caption="OWL Metamodel: hierarchy concept excerpt" >}}

The ATL transformation **UML2OWL** has been implemented according to the ODM specification, i.e. corresponding QVT mapping. This transformation made possible the conversion of an arbitrary UML model into OWL ontology. The complete scenario of this transformation is given in figure below.

{{< figure src="img/UML2OWL.png" caption="UML2OWL complete transformation scenario" width="60%" >}}

This scenario is composed of 2 ATL transformations: the core transformation UML2OWL takes has input a UML model and produces an ontology conforms to the OWL metamodel. The second transformation is an XML extractor that produces an XML document conforms to the OWL/XML syntax, as defined by the W3C specification.

The core transformation includes two distinct parts. The first part is dedicated to the mapping from UML model to ontology, i.e. UML classes are mapped into OWL classes, attributes into datatype property, associations into object property, etc. The second part of the transformation deals with instances. For simplicity and demonstration reason we choose to define instances in the same class diagram as the UML model. Those instances are converted into OWL individuals (OWL term for instances). This method offers the possibility to manage UML instances and populate the ontology with corresponding knowledge. An improved method to deal with instances should be provide soon.

A UML model representing a museum is given below and serve as a running example for this use case.

{{< figure src="img/MuseumUML.png" caption="Museum Model" width="60%" >}}

The UML2OWL transformation can produce an OWL model in ecore format or an OWL document conform to the OWL/XML presentation syntax. To obtain this XML file, we have implemented an OWL/XML extractor that transforms a model conforms to the OWL metamodel into an owl document.This will let you use obtained OWL files under ontology tools like Protégé. An excerpt of the Museum ontology produced by the UML2OWL transformation from the Museum UML Model is given below. In this excerpt you should notice the presence of a class Painter and one of its Individual representing Picasso.

{{< figure src="img/MuseumOWL.PNG" caption="Museum ontology excerpt in OWL/XML format" width="60%" >}}

This use case demonstrates the feasibility to implement the ODM specification, especially the UML to OWL mapping by using AMMA tools. This ATL scenario provides a solution for bridging modeling tools based on UML or MOF (e.g. MDA Tools) and tools for the Semantic Web and ontology development.

## Related Use Cases

None at the current time.

##  Download

{{< grid/div class="col-md-6" >}}
### [Complete scenario](../../atltransformations/#uml-to-owl)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
Scenario available in the ATL transformation zoo (with source files).
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [OWL Metamodel](https://www.eclipse.org/gmt/am3/zoos/atlanticZoo/#OWL)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
OWL metamodel is expressed in the KM3 textual format.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [UML 2.0](https://www.eclipse.org/uml2)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
The UML 2.0 Metamodel in Ecore XMI 2.0 format is available with the UML2 plugin.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

##  Acknowledgement

This work is granted by the General Council of Charente Maritime (Conseil General de Charente Maritime).
