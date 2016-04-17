//
// Created by zenus on 16-4-6.
//

#ifndef TREE_TREE_H
#define TREE_TREE_H
//struct TreeNode
//{
//    ElementType Element;
//    SearchTree Left;
//    SearchTree Right;
//};
struct TreeNode;
typedef struct TreeNode *Position;
typedef struct TreeNode *SearchTree;
typedef int ElementType;

SearchTree MakeEmpty(SearchTree T);
Position Find(ElementType X, SearchTree T);
Position FindMin(SearchTree T);
Position FindMax(SearchTree T);
SearchTree Insert(ElementType X, SearchTree T);
SearchTree Delete(ElementType X, SearchTree T);
ElementType Retrieve(Position P);
//struct TreeNode
//{
//  ElementType Element;
//  SearchTree Left;
//  SearchTree Right;
//};
#endif //TREE_TREE_H
