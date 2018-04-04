<?php

/* fonction pour ajouter un article, si deja present. modifie la quantité */
function add_article($new)
{
    if (!isset($_SESSION['panier']))
    {
        /*initialise le panier si vide */
        $_SESSION['panier'] = array();
        $_SESSION['panier']['article_couleur'] = array();
        $_SESSION['panier']['article_prix'] = array();
        $_SESSION['panier']['article_image'] = array();
        $_SESSION['panier']['article_nom'] = array();
        $_SESSION['panier']['article_categorie'] = array();
        $_SESSION['panier']['article_image'] = array();
        $_SESSION['panier']['article_quantite'] = array();
    }
    if (!check_panier($new['article_nom']))
    {
        /* push le nouveau produit */
        $_SESSION['panier']['article_nom'][] = $new['article_nom'];
        $_SESSION['panier']['article_prix'][] = $new['article_prix'];
        $_SESSION['panier']['article_image'][] = $new['article_image'];
        $_SESSION['panier']['article_couleur'][] = $new['article_couleur'];
        $_SESSION['panier']['article_categorie'][] = $new['article_categorie'];
        if (empty($new['qte']) || $new['qte'] < 1)
            $new['qte'] = 1;
        $_SESSION['panier']['article_quantite'][] = $new['qte'];
        return TRUE;
    }
    else
    {
        /* si produit deja present on modif la quantite */
        return (modif_quantity($new['article_nom'], $new['qte']));
    }
    return FALSE;
}

/* Verifie si un article est dans le panier ou pas */
function  check_panier($ref)
{
    if (count($_SESSION['panier']['article_nom']) > 0 && array_search($ref, $_SESSION['panier']['article_nom']) !== FALSE)
        return TRUE;
    return FALSE;
}

/* Modifie la quantite d'un article present dans le panier */
function modif_quantity($ref, $qte)
{
    $ret = FALSE;
    $count = count_nb_article($ref);
    if ($count !== FALSE && $qte != $count)
    {
        $nb_articles = count($_SESSION['panier']['article_nom']);
        for ($cc = 0; $cc < $nb_articles; $cc++)
        {
            if ($ref == $_SESSION['panier']['article_nom'][$cc])
            {
                $_SESSION['panier']['article_quantite'][$cc] = $qte;
                $ret = TRUE;
            }
        }
    }
    else
    {
        if (count($ref) != false)
            $ret = "absent";
        if ($qte != $count)
            $ret = "same_qte";
    }
    return $ret;
}

/* Supprime un article du panier */
function  remove_article($ref)
{
  $ret = FALSE;

  $suppr = array_keys($_SESSION['panier']['article_nom'], $ref);
  if (!empty($suppr))
  {
      foreach ($_SESSION['panier'] as $key=>$value)
      {
          foreach($suppr as $value2)
              unset($_SESSION['panier'][$key][$value2]);
          $_SESSION['panier'][$key] = array_values($_SESSION['panier'][$key]);
          $ret = TRUE;
      }
  }
  else
      $ret = "nope";
  return $ret;
}

/* Compte le nombre d'articles presents dans le panier */
function  count_nb_article($ref)
{
  $ret = FALSE;
  $max = count($_SESSION['panier']['article_nom']);
  for ($cc = 0; $cc < $max; $cc++)
  {
    if($_SESSION['panier']['article_nom'][$cc] == $ref)
      $ret = $_SESSION['panier']['article_quantite'][$cc];
  }
  return $ret;
}

/* Compte le prix total du panier */
function  count_total()
{
  $total = 0;
  $max = count($_SESSION['panier']['article_nom']);
  for ($cc = 0; $cc < $max; $cc++)
    $total += ($_SESSION['panier']['article_quantite'][$cc] * $_SESSION['panier']['article_prix'][$cc]);
    return $total;
}

/* Supprime completement le panier de la session */
function  clear_panier()
{
  if (isset($_SESSION['panier']))
  {
    unset($_SESSION['panier']);
    if (!isset($_SESSION['panier']))
      return TRUE;
  }
  return FALSE;
}

/*
$new['id'] = "1";
$new['qte'] = 1;
$new['nom'] = "nom1";
$new['prix'] = 10;
add_article($new);

$new['id'] = "2";
$new['qte'] = 2;
$new['nom'] = "nom2";
$new['prix'] = 20;
add_article($new);

$new['id'] = "3";
$new['qte'] = 3;
$new['nom'] = "nom3";
$new['prix'] = 30;
add_article($new);

modif_quantity(3, 6);
remove_article(1);

$total = count_total();
var_dump($_SESSION['panier']);
print "Total = $total\n";
*/

?>
