//
// Created by zenus on 16-4-6.
//
#include <stdio.h>
//#include "tree.h"
#include <stdlib.h>
//#include <tree.h>
#include "tree.h"

struct TreeNode
{
    ElementType Element;
    SearchTree Left;
    SearchTree Right;
};

SearchTree MakeEmpty(SearchTree T)
{
    if(T != NULL)
    {
       MakeEmpty(T->Left);
       MakeEmpty(T->Right);
        free(T);
    }
    return NULL;
}

Position Find(ElementType X, SearchTree T)
{
    if( T == NULL)
       return NULL;
    if( X < T->Element)
        return Find(X,T->Left);
    else
    if( X > T->Element)
       return Find(X,T->Right);
    else
       return T;
}

Position FindMin(SearchTree T)
{
    if( T == NULL)
       return NULL;
    else
    if( T->Left == NULL)
       return T;
    else
       return FindMin( T->Left );
}

Position  FindMax(SearchTree T)
{
    if( T != NULL)
        while( T->Right != NULL)
            T = T->Right;
    return T;
}

SearchTree Insert(ElementType X, SearchTree T)
{
   if ( T == NULL)
   {
//       create and return a one-node tree
       T = malloc( sizeof(struct TreeNode) );
       if( T == NULL)
       {
           exit(-1);
       }
       else
       {
          T->Element = X;
           T->Right = T->Left = NULL;
       }
   }
   else if ( X < T->Element)
   {
       T->Left = Insert(X,T->Left);
   }
  else if ( X > T->Element)
   {
      T->Right = Insert(X,T->Right);
   }
//    else x in the tree alreay; we'll do nothing
    return T;
}

SearchTree  Delete(ElementType X, SearchTree T)
{
    Position TmpCell;

    if( T == NULL)
    {
       exit(-1);
    }
    else if( X < T->Element)
    {
        T->Left = Delete(X,T->Left);
    }
    else if ( X > T->Element)
    {
        T->Right = Delete(X,T->Right);
    }
    else if( T->Left && T->Right)
    {
        TmpCell = FindMin(T->Right);
        T->Element = TmpCell->Element;
        T->Right = Delete(T->Element,T->Right);
    }
    else
    {
        TmpCell = T;
        if (T->Left == NULL)
        {
            T = T->Right;
        }
        else if(T->Right == NULL)
        {
           T = T->Left;
        }
        free(TmpCell);
    }
    return T;
}
