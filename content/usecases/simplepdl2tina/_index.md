---
title: "Models Validation through Petri nets"
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

# Models Validation through Petri nets: The SimplePDL to TINA Case Study

> **By Benoit Combemale (IRIT)** \
> February 2007

This work presents a use case of model transformation using ATL rules to validate MDD's models. This use case considers a simplified process description language, SimplePDL. It then presents a property-driven approach in which SimplePDL process models are translated into Petri nets. SimplePDL behavioral properties are expressed on corresponding Petri nets in LTL (Linear Temporal Logic). The Tina toolkit and, in particular, its model-checker, are used to validate process models by checking the expressed properties. All the code for the transformations in ATL and for the metamodels in KM3 is available from the [Zoos](https://www.eclipse.org/gmt/am3/zoos/).

This work has been done in collaboration between [IRIT](https://www.irit.fr/) and [LAAS](https://www.laas.fr/en/) labs in Toulouse, France.

## Keywords

DSL's Translational Semantics, Verification, Process Engineering, SimplePDL, [Petri nets](https://en.wikipedia.org/wiki/Petri_net), [Tina](http://www.laas.fr/tina/).

## Overview

### Building blocs

This use case is introduced through a modeling language example on which we would like to express a set of properties that have to be verified on all possible models. Our DSL is a simple process description language: SimplePDL.

**SimplePDL** is an experimental language for specifying processes. The SPEM standard (*Software Process Engineering Metamodel*) proposed by the OMG inspired our work, but we also took ideas from the UMA metamodel (*Unified Method Architecture*) used in the [EPF Eclipse plug-in](http://www.eclipse.org/epf/) (*Eclipse Process Framework*), dedicated to process modeling. SimplePDL is simplified to keep the presentation simple.

Its metamodel is given in the figure 1. It defines the process concept (**Process**) composed of a set of work definitions (**WorkDefinition**) representing the activities to be performed during the development. One workdefinition may depend upon another (**WorkSequence**). In such a case, an ordering constraint (**linkType**) on the second workdefinition is specified, using the enumeration **WorkSequenceType**. For example, linking two workdefinitions **wd1** and **wd2** by a precedence relation of kind **finishToStart** means that **wd2** can be started only if **wd1** is finished (and respectively for **startToStart**, **startToFinish** and **finishToFinish**). SimplePDL does also allow to explicitly represent resources (**Resource**) that are needed in order to perform one workdefinition (designer, computer, server...) and also time constraints (**min\_time** and **max\_time** on **WorkDefinition** and **Process**) to specify the minimum (resp. maximum) time allowed to perform the workdefinition or the whole process.

One can remark that, for the sake of brevity, some concepts are not presented here such as products (**WorkProduct**) that workdefinitions handle, or roles (**Role**) that can be assimilated to resources.

In order to create process models conformed to SimplePDL, the Topcased project allows to generate graphical editors under the Eclipse framework.

{{< figure src="img/SimplePDL.png" caption="Figure 1. SimplePDL metamodel in Ecore" width="55%" >}}

The **PetriNet** metamodel is given in the figure 2. A Petri net (**PetriNet**) is composed of nodes (**Node**) that denote places (**Place**) or transitions (**Transition**). Nodes are linked together by arcs (**Arc**). Arcs can be normal ones or read-arcs (**ArcKind**). The number attached to an arc specifies the number of tokens that are consumed in the source place or produced in the target one (in case of a read-arc, it is only used to check whether the source place contains more tokens than the specified number). Petri nets markings are defined by the **tokensNb** attributes of places. Finally, we can express a time interval on transitions. A transition can only be started between min and maw time.

Beware! Such metamodel allows to build invalid models. For example, one can put a link between two places or two transitions. One solution is to complete the model with OCL constraints to restrict models to valid instances.

{{< figure src="img/PetriNet.png" caption="Figure 2. PetriNet metamodel in Ecore" width="40%" >}}

[Tina](http://www.laas.fr/tina) (TIme Petri Net Analyser) is a software environment to edit and analyse Petri nets and temporal nets. The different tools constituting the environment can be used alone or together. Some of these tools will be used in this study:

  * nd (NetDraw): is an editing tool for automatae and temporal networks, under a textual or graphical form. It integrates a simulator "step by step" (graphical or textual) for the temporal networks and allows to call other tools without leaving the editor.
  * tina: this tool builds the state space of a Petri net, temporal or not. Tina can perform classical constructs (marking graphs, covering trees) and also allows abstract state space construction, based on partial order techniques. Tina proposes, for temporal networks, all quotient graph constructions discussed in.
  * selt: usually, it is necessary to check more specific properties than the ones dedicated to general accessibility alone, such as boundedness, deadlocks, pseudo liveness and liveness already checked by tina. The selt tool is a model-checker for formulae of an extension of temporal logic seltl (State/Event LTL) of. In case of non satisfiability, selt is able to build a readable counter-example sequence or in a more compressed form usable by the Tina simulator, in order to execute it step by step.

### The translation schema from a SimplePDL model into Petri nets

The **translation schema** that transforms a process model into a Petri nets model is given in the next figures. Each work definition is translated into four places characterising the state (*NotStarted*, *Started*, *InProgress* and *Finished*) in order to translate each **WorkSequence** by a **read-arc** between one source work definition place and the target work definition transition. We can remark that the state *Started* allows to memorise that one work definiton has already been started. We also add five places that will define a local clock. The clock will be in state TooEarly when the workdefinition ends before **min\_time** and in the state *TooLate* when the work definition ends after **max\_time**.

{{< figure src="img/mapping.png" caption="Figure 3. Translation schema - part 1" width="55%" >}}

{{< figure src="img/SimplePDL2PetriNetconceptual.png" caption="Figure 4. Translation schema - part 2" width="55%" >}}

The transformation is defined using three ATL rules (see Figure 5.). The first expresses one work definition in terms of places and transitions. The second translates a work sequence into a read-arc between the adequate place of the source work definition and the appropriate transition of the target work definition. The ATL resolveTemp operation is necessary because multiple places and transitions have been created for each **WorkDefinition**. Finally the last rule considers the whole process and builds the associated Petri net.

{{< figure src="img/pdl2pn.atl.png" caption="Figure 5. SimplePDL2PetriNet" >}}

We illustrate the SimplePDL2Petrinet transformation on simplified meta-models in order to keep the presentation simple. Other elements such as ressources, time and the fact that one activity can be split into multiple sub-activities have been modeled. Figure 6. shows the translation from one temporal **WorkDefinition** using resources. Figure 7. gives rules for consider **Resource**.

{{< figure src="img/temporalPN1.png" caption="Figure 6. Translation from one temporal WorkDefinition using resources" width=55%" >}}

{{< figure src="img/pdl2pnR.atl.png" caption="Figure 7. ATL Resource rules" >}}

In order to manipulate the obtained Petri net inside a dedicated tool such as *Tina*, we have composed the preceding transformation with a query *PetriNet2Tina* that translates the Petri net as a model of **PetriNet** into a textual form (.net) conforming to the concrete textual syntax of the *Tina* tool.

{{< figure src="img/pn2tina.atl.png" caption="Figure 8. PetriNet2Tina" >}}

### Properties generation for process model validation

After expressing process models into Petri nets models, we want to **check the properties associated to SimplePDL models** using the Tina toolkit. The main principle is to generate LTL properties using ATL queries. We generate LTL formulas in textual form. Therefore, we have to be aware of the translation shema from SimplePDL to PetriNet and Tina to ensure the consistency of the properties expression. Working directly on PetriNet level would have require to formalize the LTL metamodel which seems to be irrelevant in such case.
We express below the kind of properties that we target to check in the current use case.

**Model consistency verification:** When the user elaborates his process model, he describes the constraints that will drive his process. They can be causality relationships, like when a work definition is able to start only if some others are finished. They can express the necessity to be able to use a certain amount of resources or even temporal constraints. Once all such constraints are expressed, the user must be able to check whether his process is satisfiable. In other words, does one execution exists that satisfies all causality constraints while respecting ressource usage and temporal restrictions? Model-checking technics allows to reach this goal. A process satisfying all such constraints is valid for us if it can terminates, i.e. it can reach a state where all its work definitions are in their finished state. Other alternatives can be considered. This notion of termination must be defined at the SimplePDL level. The macro-proposition finished is automatically generated during the translation of the SimplePDL model (cf. listing below).

{{< figure src="img/checkmodel.png" caption="Figure 9. finished query" >}}

**Transformation soundness:** Even if the translation is expressed in ATL at an adequate abstraction layer, it is still important to ensure transformation consistency. The resulting Petri net model must be revelant with respect to the SimplePDL specification. But its complexity makes the analysis difficult. To facilitate the definition of the ATL translation et to ensure the conformance of the resulting Petri net, we automatically generate a set of LTL formulae which have to be satisfied by the Petri net translation of the initial SimplePDL process model. These formulae are able to express that differents states modeled by a single value in the SimplePDL model have to be mutually exclusive in the Petri net one. The following listing gives an example. The set of these properties can be seen a proof obligations. They are generated during the translation phase and depend on the naming convention used for places and transitions in the SimplePDL2PetriNet mapping.

{{< figure src="img/checktransfo.png" caption="Figure 10. invariants query" >}}

## Related Use Cases

None at the current time.

## References

  1. Combemale, B, Garoche P-L, Crégut, X, Thirioux, X: Towards a Formal Verification of Process Model's Properties -- SimplePDL and TOCL Case Study. In: Proceedings of the 9th International Conference on Enterprise Information Systems (ICEIS), 12-16, June 2007, Funchal, Madeira - Portugal.
  2. (article in french) Combemale, B, Crégut, X, Berthomieu, B, and Vernadat, F: SimplePDL2Tina : Mise en oeuvre d'une Validation de Modèles de Processus. In: Proceedings of the 3ieme journées sur l'Ingénierie Dirigée par les Modèles (IDM), March 23th, Toulouse, France. 2007.
  3. (tutorial in french) Pantel, M, Crégut, X, and Combemale, B: La Méta-modélisation et la Transformation de Modèles (2007).

##  Download

  * [Complete scenario](../../atltransformations/#simplepdl2tina-models-verification-through-petri-nets): Scenario SimplePDL to Tina available in the ATL transformation zoo (with source files).

## Acknowledgement

The present work is being supported by the ModelPlex european project, the FLFS ANRT project (Families of Language for Families of Systems), the OpenEmbeDD project, and the Usine Logicielle project of the System@tic Paris Region Cluster.
