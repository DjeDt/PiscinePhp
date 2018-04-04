<?php
	if (!file_exists('login/private'))
	{
		mkdir("login/private");
	}
	if (!file_exists('login/private/passwd'))
	{
		file_put_contents('login/private/passwd', null);
	}

	$tmp['login'] = "ddinaut";
	$tmp['passwd'] = hash('whirlpool', "admin");
	$tmp['privilege'] = "admin";
	$tmp['email'] = "admin@gmail.com";
	$account[] = $tmp;
	file_put_contents('login/private/passwd', serialize($account));

	$tmp['login'] = "cprouveu";
	$tmp['passwd'] = hash('whirlpool', "admin");
	$tmp['email'] = "admin@gmail.com";
	$account[] = $tmp;
	file_put_contents('login/private/passwd', serialize($account));


	if (!file_exists('produits'))
	{
		mkdir("produits");
	}
	if (!file_exists('produits/produits_liste'))
	{
		file_put_contents('produits/produits_liste', null);
	}

	$tmp2['article_categorie'] = "chat";
	$tmp2['article_nom'] = "chat_blanc";
	$tmp2['article_image'] = "./produits/images/chat_blanc.jpeg";
	$tmp2['article_couleur'] = "blanc";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));

	$tmp2['article_categorie'] = "chat";
	$tmp2['article_nom'] = "chat_gris";
	$tmp2['article_image'] = "./produits/images/chat_gris.jpeg";
	$tmp2['article_couleur'] = "gris";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));

	$tmp2['article_categorie'] = "chat";
	$tmp2['article_nom'] = "chat_noir";
	$tmp2['article_image'] = "./produits/images/chat_noir.jpeg";
	$tmp2['article_couleur'] = "noir";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));

	$tmp2['article_categorie'] = "chat";
	$tmp2['article_nom'] = "chat_multicolore";
	$tmp2['article_image'] = "./produits/images/chat_multicolore.jpeg";
	$tmp2['article_couleur'] = "multicolore";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));

	$tmp2['article_categorie'] = "chat";
	$tmp2['article_nom'] = "chat_roux";
	$tmp2['article_image'] = "./produits/images/chat_roux.jpeg";
	$tmp2['article_couleur'] = "roux";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));

	$tmp2['article_categorie'] = "chat";
	$tmp2['article_nom'] = "chat_poil_longs_blanc";
	$tmp2['article_image'] = "./produits/images/chat_poil_longs_blanc.jpeg";
	$tmp2['article_couleur'] = "blanc";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));

	$tmp2['article_categorie'] = "chat";
	$tmp2['article_nom'] = "chat_poil_longs_multicolore";
	$tmp2['article_image'] = "./produits/images/chat_poil_longs_multicolore.jpeg";
	$tmp2['article_couleur'] = "multicolore";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));

	$tmp2['article_categorie'] = "chat";
	$tmp2['article_nom'] = "chat_poil_longs_noir";
	$tmp2['article_image'] = "./produits/images/chat_poil_longs_noir.jpeg";
	$tmp2['article_couleur'] = "noir";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));

	$tmp2['article_categorie'] = "chien";
	$tmp2['article_nom'] = "chien_berger_belge_beige";
	$tmp2['article_image'] = "./produits/images/chien_berger_belge_beige.jpeg";
	$tmp2['article_couleur'] = "beige";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));

	$tmp2['article_categorie'] = "chien";
	$tmp2['article_nom'] = "chien_berger_belge_noir";
	$tmp2['article_image'] = "./produits/images/chien_berger_belge_noir.jpeg";
	$tmp2['article_couleur'] = "noir";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));

	$tmp2['article_categorie'] = "chien";
	$tmp2['article_nom'] = "chien_labrador_beige";
	$tmp2['article_image'] = "./produits/images/chien_labrador_beige.jpeg";
	$tmp2['article_couleur'] = "beige";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));

	$tmp2['article_categorie'] = "chien";
	$tmp2['article_nom'] = "chien_labrador_noir";
	$tmp2['article_image'] = "./produits/images/chien_labrador_noir.jpeg";
	$tmp2['article_couleur'] = "noir";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));

	$tmp2['article_categorie'] = "chien";
	$tmp2['article_nom'] = "chien_chat";
	$tmp2['article_image'] = "./produits/images/chat_chien.jpeg";
	$tmp2['article_couleur'] = "beige";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));

	$tmp2['article_categorie'] = "chat";
	$tmp2['article_nom'] = "chien_chat";
	$tmp2['article_image'] = "./produits/images/chat_chien.jpeg";
	$tmp2['article_couleur'] = "beige";
	$tmp2['article_quantite_dispo'] = "2";
	$tmp2['article_prix'] = "100";
	$product_list[] = $tmp2;
	file_put_contents('produits/produits_liste', serialize($product_list));


?>
