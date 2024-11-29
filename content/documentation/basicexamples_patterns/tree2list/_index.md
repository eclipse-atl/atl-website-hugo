---
title: "The Tree to List example"
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

# The Tree to List example

> **Summary**
> 
> This transformation presents a basic example where a tree is transformed into a list. This kind of transformation is usually made by an imperative Depth First Traversal algorithm.
> 
> **By Cyril Faure (CS) and Freddy Allilaire (INRIA)** \
> Copyright © 2007 CS and INRIA. \
> July, 2007

## Introduction

This transformation presents a basic example where a tree is transformed into a list. This kind of transformation is usually made by an imperative Depth First Traversal algorithm. Moreover with this example, the following ATL concepts will be encountered:

  * matched rules (one with a guard)
  * helper functions (one being recursive)
  * collection related functions
  * an enumeration
  * ATL resolve algorithm

## The Tree Metamodel

{{< figure src="img/MMTree.PNG" caption="Tree Metamodel" >}}

This metamodel is pretty simple and represents a tree whose elements have a name and nodes' leaves can be of small, medium or big size. The root element should be a Node.

## The Element List Metamodel

{{< figure src="img/MMElementList.PNG" caption="List Metamodel" >}}

The ElementList metamodel aims to represent an ordered list of elements, each element having a name. The root element should be a RootElement.

## The Tree to ElementList Transformation: Step by step

### The principles and goals

Let **MMTree** be the tree metamodel's name and **MMElementList** be the ElementList metamodels' name.

In this transformation, we want:

  * the tree root (of type MMTree!Node) to be transformed into the Element list "root" (of type MMElementList!RootElement)
  * a MMTree!Leaf element should be transformed into an MMElementList!CommonElement element
  * the root element's **elements** reference should contain an ordered set composed of the "transformed equivalent" of the leaves such as:
      * all big sized leaves comes first (in the tree's DFS order)
      * then all medium sized leaves (still in the tree's DFS order)
      * then the small sized one (still in the tree's DFS order)

The figure below instantiates a transformation example. The nodes' names are represented by an integer and the tree root is named "0".

{{< figure src="img/Tree2List_GraphicalOverview.PNG" caption="Tree2List Big Picture" >}}

### Writing the first rule

We start this example with the matched rule **TreeNode2RootElement** where a **Tree Node** is transformed into a **RootElement**. A matched rule enables to match some of the model elements of a source model, and to generate from them a number of distinct target model elements.

	rule TreeNode2RootElement {
		from
			rt : MMTree!Node
		to
			lstRt : MMElementList!RootElement (
				name <- rt.name
			)
	}

### Filtering the tree node root

With the rule above, for each **Tree Node** in the source model a **RootElement** is created in the target model. This does not match exactly with our requirements. Here we want to catch only the tree node root. For only filtering the root, we should add a guard to this rule.

In order to clear our transformation code as much as possible, we will use an helper to define the guard. An helper is an auxiliary function that computes a result needed in a rule. See below the code of the guard **isTreeNodeRoot**:

	helper context MMTree!TreeElement def : isTreeNodeRoot() : Boolean =
		self.refImmediateComposite().oclIsUndefined();
		-- refImmediateComposite() is a reflective operation that returns the immediate composite (e.g. the immediate container) of self
		-- So if there is no immediate composite then the current node is the root (we suppose in our example that there is only one root).

We can now call this helper in the guard of the rule **TreeNodeRoot2RootElement** (NB: rule name has been updated from **TreeNode2RootElement**).

	rule TreeNodeRoot2RootElement {
		from
			rt : MMTree!Node (rt.isTreeNodeRoot())
		to
			lstRt : MMElementList!RootElement (
				name <- rt.name
			)
	}

### Applying the ATL philosophy

The first idea to complete our transformation is to add a second rule to transform a **Leaf** into a **ListElement**. The corresponding code is:

	rule TreeNodeRoot2RootElement {
		from
			rt : MMTree!Node (rt.isTreeNodeRoot())
		to
			lstRt : MMElementList!RootElement (
				name <- rt.name
			)
	}
	
	rule Leaf2CommonElement {
		from
			s : MMTree!Leaf
		to
			t : MMElementList!CommonElement(
				name <- s.name
			)
	}

### Getting all the tree root children and filling the containment reference

Executing the previous transformation will create the list root element from one side and the elements from other side. At this step of the transformation, there is no link between the list root and the elements of this list. Hence, one point should be solved:

  * How to put the created elements in the containment reference (called **elements**) of the concept **MMElementList!RootElement**?

First of all, we need to create an helper to retrieve and to return all the children of a node.

This helper proceeds to a Depth First Traversal (DFS) algorithm and returns the list of all leaves encountered during the search. We use a recursive function on the tree root's children which would build a **MMElementList!CommonElement** list corresponding to the leaves encountered during the DFS. Briefly, the algorithm:

  * iterates on the current node children
  * tests the current child type (node or leaf)
      * if it is a node, a recursive call is made,
      * else the current child is added to the children list

	helper context MMTree!Node def : getAllChildren () : OrderedSet(MMTree!TreeElement) =
		self.children->iterate( child ; elements : OrderedSet(MMTree!TreeElement) = 
			OrderedSet{} | 
			if child.oclIsTypeOf(MMTree!Node) then
				elements.union(child.getAllChildren ()) -- NODE : recursive call
			else
					elements.append(child) -- LEAF
			endif
			)
		;

To solve our containment problem, we can use the following code:

	rule TreeNodeRoot2RootElement {
		from
			rt : MMTree!Node (rt.isTreeNodeRoot()) 
		to
			lstRt : MMElementList!RootElement (
				name <- rt.name,
				elements <- elmLst
			),
			elmLst : distinct MMElementList!CommonElement foreach(leaf in rt.getAllChildren())(
				name <- leaf.name
			)
	}

With this solution, the rule **Leaf2CommonElement** (created in the previous step) is now useless and must be deleted. The transformation is done with only one matched rule. For each element of its **elements** reference, we create a **MMElementList!CommonElement**. Each element of this list is computed via a distinct keyword which creates a CommonElement for each Leaf of a list we compute via an helper. 

### Using the ATL Resolve Algorithm

In this example, we want to follow as much as possible the ATL convention. So in this step, our goal is to make more "modular" our transformation. This could be done by using the ATL Resolve Algorithm.

> **Execution Semantics of Matched Rules and ATL Resolve Algorithm**
> 
> Matched rules are executed over matches of their source pattern. For a given match the target elements of the specified types are created in the target model and are initialized using the bindings. Executing a rule on a match additionally creates a traceability link in the internal structures of the transformation engine. This link relates three components: the rule, the match (i.e. source elements) and the newly created target elements. Actual feature initialization uses a specific value resolution algorithm, called ATL resolve algorithm. After the expression of a binding has been evaluated, the resulting value is first resolved before being assigned to the corresponding target feature. Resolution depends on the type of the value. If the type is primitive, then the value is simply assigned to the corresponding feature. If its type is a metamodel type there are two possibilities:
> 
>   1. when the value is a target element it is simply assigned to the feature;
>   2. when the value is a source element it is first resolved into a target element using traceability links. The resolution results in an element from the target model, which is assigned to the feature. This algorithm uses traceability links to identify the target elements created from a given source element as a result of application of a transformation rule.
> 
> Thanks to this algorithm, target elements can be effectively linked together using source model navigation only. Finding the appropriate target elements is left to ATL execution engine.

With the ATL Resolve Algorithm, the transformation could be updated as follow:

	rule TreeNodeRoot2RootElement { 
		from
			rt : MMTree!Node (rt.isTreeNodeRoot())
		to
			lstRt : MMElementList!RootElement (
				name <- rt.name,
				elements <- rt.getAllChidren()
			)
	}
	
	rule Leaf2CommonElement {
		from
			s : MMTree!Leaf
		to
			t : MMElementList!CommonElement(
				name <- s.name
			)
	}

### Sorting leafs by size

In this final step, we will sort elements list by the corresponding leaf size.

To respect this requirement, we will create an helper to get leaves in the following order: big, medium, and small.

	helper context MMTree!Node def : getLeavesInOrder : OrderedSet (MMTree!Leaf) =
		let leavesList : OrderedSet (MMTree!Leaf) = 
			self.getAllChildren ()->select(currChild | currChild.oclIsTypeOf(MMTree!Leaf))
		in
			leavesList->select(leaf | leaf.size = #big)
			->union(leavesList->select(leaf | leaf.size = #medium))
			->union(leavesList->select(leaf | leaf.size = #small))
		;

This helper uses another recursive helper (getAllChildren) defined previously which proceeds to a DFS and returns the list of all leaves encountered during the search. Let "leaves" being the list of leaves, we compute a 3 set partition of leaves : one "big leaves" list, one "medium leaves" list and one "small leaves" list. We then make an union of these 3 lists which gives us the well ordered leave list used by the distinct keyword of the main rule.

	rule TreeNodeRoot2RootElement { 
		from
			rt : MMTree!Node (rt.isTreeNodeRoot()) 
		to
			lstRt : MMElementList!RootElement (
				name <- rt.name,
				elements <- rt.getLeavesInOrder
			)
	}
	
	rule Leaf2CommonElement {
		from
			s : MMTree!Leaf
		to
			t : MMElementList!CommonElement(
				name <- s.name
			)
	}

## Download
	
  * [Tree2List](../../../atltransformations/Tree2List/Tree2List.zip): Source code for the scenario Tree to List

## Acknowledgement

The present work is being supported by the Usine Logicielle project of the System@tic Paris Region Cluster.
