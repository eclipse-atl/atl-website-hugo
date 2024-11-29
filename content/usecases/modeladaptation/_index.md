---
title: "Model Adaptation"
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

# Model Adaptation

> **By Kelly Garces (Ecole des Mines de Nantes)** \
> December 2009

The evolution of a metamodel may render its related terminal models invalid. This use case proposes a three-step solution that automatically adapts terminal models to their evolving metamodels. The main contribution is the precise detection of metamodel changes by using the [AtlanMod Matching Language (AML)](https://hal.science/hal-00466942), a DSL built on top of ATL and AMW. The running example is the Petrinet models.

## Prerequisites

[AML](https://hal.science/hal-00466942), AMW, and ATL 3.0 are required to execute this use case.

## Keywords

Metamodel Evolution, Model Adaptation, Model Transformation, Petrinet.

## Overview

This use case presents a solution to the model adaptation problem. This solution has been presented in [1]. Figure 1 illustrates the problem: a metamodel **MM1** evolves into a metamodel **MM2** (see the dotted arrow). Our concern is to adapt any terminal model **M1** conforming to **MM1** to the new metamodel version **MM2** (see the dashed arrow).

{{< figure src="overviewEvolution.PNG" caption="Figure 1. Metamodel evolution and model adaptation" >}}

The use case proposes a three-step adaptation (see Figure 2). Firstly, an matching strategy computes the equivalences and changes between **MM1** and **MM2**. Secondly, a HOT derives an ATL transformation from the discovered equivalences and changes. Finally, this transformation brings **M1** into agreement with **MM2**, and persists the result in **M2**. We implement the prototype on the AMMA platform. More specifically, we use the AtlanMod Matching Language (AML) to specify the matching strategy, AMW to work with models of equivalences and changes, and ATL to implement the HOT. The HOT generates the adaptation transformation in ATL code too.

{{< figure src="overviewApproach.PNG" caption="Figure 2. Approach Overview" >}}

The bulk of this use case is devoted to the first step that discovers equivalences, as well as simple and complex changes. We explicitly distinguish two kinds of changes because complex changes need a more insightful adaptation that simple changes. Whereas a simple change describes the addition, deletion, or update of one metamodel concept, a complex change integrates a set of actions affecting multiple concepts. The reader interested on examples of simple and complex changes may consult [2].

The running example is based on the two versions of the Petri Net metamodel provided by [3]. Figure 3 illustrates versions 0 (**MM1**) and 2 (**MM2**). MM1 represents simple Petri Nets. These nets may consist of any number of places and transitions. A transition has at least one input and one output place. **MM2** represents more complex Petri Nets. The extraction of the reference **dst** illustrates a complex change named **Extract class**. This implies to add and remove a reference, add a class, and associate classes. In considering these actions as isolated simple changes, we may skip changes without migrating involved data from **M1** to **M2**. In contrast, when we distinguish the complex change, we infer (for instance) that the added property (e.g., **dst**), contained in the new class **PTArc**, actually corresponds to the property **dst** removed from the class **Place**. Since we know the relationship between the properties we can migrate the data. We thus need to explicitly distinguish complex changes in order to properly derive adaptation transformations.

{{< figure src="petrinetMM.PNG" caption="Figure 3. Petrinet metamodels" >}}

### First step - Matching equivalences and changes

#### Model of equivalences and changes

Before describing the matching step, we explain how matching models represent equivalences and changes. Such models conforms to the **Matching metamodel** (which extends the AMW core metamodel) illustrated in Figure 4. The main concept is **Equal** which describes a mapping (or correspondence) between an element of **MM1** (**leftElement**) and an element of **MM2** (**rightElement**). **Equal** has a similarity value (between 0 and 1) that represents the plausibility of the correspondence. An equivalence with similarity value 1 represents that the **MM2** element is an identical copy of the **MM1** element. An equivalence with similarity value 0.7 describes that the **MM2** element is a copy of the **MM1** element including simple modifications. An equivalence with similarity value 0 link elements different to each other. Other basic concepts are **Added** and **Deleted** which mark a metamodel element as deleted/added from/into **MM1**.

{{< figure src="matchingMetamodel.PNG" caption="Figure 4. Excerpt of the matching metamodel" >}}

#### Matching step

Matching models are computed by AML strategies, i.e., processes that incrementally execute a set of ATL transformations. Figure 5 shows an excerpt of the used AML strategy. This indicates how ATL transformations (generated by the AML compiler) interact each other to deliver the equivalences and changes.

  *	**TypeClass**, **TypeReference**, and **TypeAttribute** prepares three collections of equivalences by matching classes, references, and attributes of **MM1** and **MM2**.
  *	**Merge** combines the three collections into a single equal model.
  * **Levenshtein** computes similarity values by comparing the edit distance of metamodel element names.
  *	**ThresholdMaxDelta** selects an equivalence when its similarity satisfies the range of tolerance [Threshold-Delta, Threshold].
  *	**Propagation**, **SF**, and **Normalization** instruments the Similarity Flooding algorithm [4].
  * **WeightedAverage** aggregates the similarity values returned by Levenshtein and Normalization.
  * **BothMaxSim**, in turn, selects a given equivalence if its similarity value is the highest among the values of equivalences of two sets (e.g., leftSet and rightSet). The leftSet contains all the equivalences linking a left concept, and the rightSet the equivalences linking a right concept.
  * Whereas **Differentiation** recognizes equivalences, additions, and deletions, **TypeDifferentiation** gives a type to them. The type indicates what kind of elements are linked on, for example, the type **EqualReference** indicates an equivalence between references.
  * **Rewriting** reorganizes a given equal model to make it closer to transformations. **FlattenFeatures** copies **EqualAttribute** and **EqualReference** contained in **EqualClass** (e.g., matching class C) into every **EqualClass** matching a class that inherits directly or indirectly from C.

		modelsFlow {

			tp = TypeClass[map2]
			typeRef = TypeReference[map2]
			typeAtt = TypeAttribute[map2]

			merged = Merge[1.0:tp, 1.0:typeRef, 1.0:typeAtt]

			nam = Name[merged]

			filtered = ThresholdMaxDelta[nam]
			prop = Propagation[filtered]
			sf = SF[filtered](prop)
			norm = Normalization[sf]

			tmpresult = WeightedAverage[0.5 : norm, 0.5:nam]

		 	result = BothMaxSim[tmpresult]

			diff = Differentiation[result]
			td = TypeDifferentiation[diff]
			cl = ConceptualLink[td]
			rw = Rewriting[cl]
			flatt = FlattenFeatures[rw]
		}

{{< grid/div class="text-center" >}}
Figure 5. AML strategy excerpt
{{</ grid/div >}}

The transformations above are generic enough to be applied to many use cases. It is **ConceptualLink** the one that figures out complex changes, and therefore leverages the solution to the model adaptation problem. For example, Figure 6 shows a rule that verifies if change **Extract Class** has happened. The helper 'isExtractClass' evaluates if: 1) there is a relation between the owner classes of the structural features referenced by **EqualStructuralFeature** 2) the right class is a new class. If the conditions are satisfied, the rule decorates a simple equivalence with the type **ExtractClass**.

{{< figure src="conceptualLinkRule.PNG" caption="Figure 6. A conceptual link rule" >}}

Note that our approach may need the user to refine the results. The refinement can happen at high-abstraction level, i.e., over final matching models, or at low-abstraction level, i.e., over generated adaptation transformations.

### Second step - Translation to adaptation transformations

In this step, the equivalences and differences are translated into an ATL adaptation transformation via a HOT.

  *	Yield a transformation rule for each **EqualClass** that links no abstract classes. The HOT takes referred left and right classes to yield input and output patterns.
  * Create a binding for each **EqualStructuralFeatures** attached to a **EqualClass**. The binding complexity depends on the **Equal** type. While a simple **EqualStructuralFeature** generates a simple binding, **EqualStructuralFeature** extensions (e.g., **ExtractClass**) generate more elaborated bindings. In general, sophisticated bindings instruments the code that adapt **M1** models to complex changes.

Figure 7 shows an ATL adaptation transformation which is generated by the HOT. This creates the transformation rule **Place2Place** (line 5) from the equivalence (**Place**, **Place**). The **from** part matches the elements conforming to **Place** (lines 7-9). The **to** part creates elements conforming to **Place**. The HOT moreover generates a complex binding (see lines 13-14) from the equivalence (**out**, **dst**). The binding calls a lazy rule (i.e., **PTArc**) to initialize **dst** and **src** of **PTArc** (lines 20-29) using the values **Transition** and **Place**.

{{< figure src="petrinetAdapTransf.PNG" caption="Figure 7. Petrinet transformation excerpt" >}}

### Third step - Adaptation transformation execution

This step simply executes the generated adaptation transformation. The transformation takes any terminal model **M1** and generates a terminal model **M2**.

## Related Use Cases

{{< grid/div class="col-md-6" >}}
### [Matching](../matching/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
This use case introduces the fundamentals behind AML strategies.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

{{< grid/div class="col-md-6" >}}
### [Metamodel Comparison and Model Migration](../compare/)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
An application of matching to model migration. The difference between the model migration use case and our use case is that the latter uses AML to automatically generate the ATL transformations.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

## References

  1. Garces, K., Jouault, F., Cointe, P., Bezivin, J.: Managing Model Adaptation by Precise Detection of Metamodel Changes. In: In Proc. of ECMDA 2009, Enschede, The Netherlands, Springer, 2009.
  2. Garces K., Jouault F., Cointe P., Bezivin J., Practical Adaptation of Models to Evolving Metamodels, Technical report, INRIA, 2008.
  3. Wachsmuth G., Metamodel Adaptation and Model Co-adaptation, in E. Ernst (ed.), ECOOP 2007, Berlin, Germany, Proceedings, vol. 4609 of Lecture Notes in Computer Science, Springer, 2007.
  4. Melnik S., Garcia-Molina H., Rahm E., Similarity Flooding: A Versatile Graph Matching Algorithm and ist Application to Schema Matching, Proc. 18th ICDE, San Jose, CA, 2002.

##  Download

{{< grid/div class="col-md-6" >}}
### [Complete scenario](aml-adaptation.psf)
{{</ grid/div >}}
{{< grid/div class="col-md-12" >}}
A psf file that points to the Adaptation AML project. Please download this file on your local disk, and then import the project in Eclipse using : File->Import->Team->Team Project Set. Besides the Adaptation project, you need the AMLLibrary project, find here the instructions to download it. Finally, the file 'Readme.txt' contains all the instructions to execute the AML strategy.
{{</ grid/div >}}

&nbsp;

&nbsp;

&nbsp;

##  Demo

{{< youtube WXT6aB1lm0k >}}

## Acknowledgement

This work has been partially funded by the FLFS ANR project (Families of Language for Families of Systems).
