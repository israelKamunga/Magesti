<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Magesti - Gestion des Articles</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      display: flex;
      height: 100vh;
      background-color: #f9fbfd;
    }

    .sidebar {
      width: 250px;
      background-color: #1f3b71;
      color: white;
      padding: 20px;
    }

    .sidebar .logo {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 40px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .sidebar .logo i {
      font-size: 22px;
      color: #4eaaff;
    }

    .menu a {
      display: flex;
      align-items: center;
      gap: 10px;
      color: white;
      padding: 12px 10px;
      margin-bottom: 12px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 15px;
      transition: background 0.3s;
    }

    .menu a:hover, .menu a.active {
      background-color: #335296;
    }

    .menu a i {
      font-size: 16px;
    }

    .main {
      flex: 1;
      display: flex;
      flex-direction: column;
    }

    .topbar {
      height: 60px;
      background-color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 25px;
      border-bottom: 1px solid #e1e4e8;
    }

    .topbar .logo {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 20px;
      font-weight: bold;
      color: #1f3b71;
    }

    .topbar .logo i {
      color: #4eaaff;
    }

    .topbar .user-icon i {
      font-size: 20px;
      color: #4eaaff;
      background: #e5f0ff;
      padding: 10px;
      border-radius: 50%;
    }

    .content {
      padding: 30px;
      flex: 1;
      overflow-y: auto;
    }

    .content h1 {
      font-size: 26px;
      margin-bottom: 20px;
      color: #1f3b71;
    }

    .search-bar {
      margin-bottom: 20px;
      display: flex;
      align-items: center;
    }

    .search-bar input {
      padding: 10px 15px;
      width: 300px;
      border: 1px solid #d0d7e2;
      border-radius: 6px;
      font-size: 14px;
    }

    .actions {
      display: flex;
      gap: 12px;
      margin-bottom: 25px;
    }

    .actions button {
      background-color: #e5edff;
      color: #2a4fa2;
      border: 1px solid #c3d4fa;
      padding: 10px 14px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 500;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .actions button i {
      font-size: 14px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      border: 1px solid #e3e6eb;
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 14px 18px;
      text-align: left;
    }

    th {
      background-color: #f7f9fb;
      color: #445b84;
      font-size: 14px;
    }

    td {
      color: #333;
      font-size: 14px;
      border-top: 1px solid #f0f2f5;
    }

    .btn-action {
      padding: 6px 10px;
      border-radius: 6px;
      font-size: 13px;
      font-weight: 500;
      border: 1px solid transparent;
      cursor: pointer;
    }

    .btn-edit {
      background-color: #eef5ff;
      color: #2062cc;
      border-color: #b9d6ff;
      margin-right: 8px;
    }

    .btn-delete {
      background-color: #ffeeee;
      color: #e54545;
      border-color: #f5bcbc;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <div class="logo"><i class="fas fa-cube"></i> Magesti</div>
    <div class="menu">
      <a href="#" class="active"><i class="fas fa-table-list"></i> Gestion des articles</a>
      <a href="#"><i class="fas fa-sliders-h"></i> Modification des quantités</a>
      <a href="#"><i class="fas fa-clock"></i> Consultation</a>
      <a href="#"><i class="fas fa-print"></i> Impression</a>
      <a href="#"><i class="fas fa-wrench"></i> Programme utilitaires</a>
    </div>
  </div>
  <div class="main">
    <div class="topbar">
      <div class="logo"><i class="fas fa-cube"></i> Magesti</div>
      <div class="user-icon"><i class="fas fa-user-circle"></i></div>
    </div>
    <div class="content">
      <h1>Gestion des articles</h1>
      <div class="search-bar">
        <input type="text" placeholder="Rechercher un article...">
      </div>
      <div class="actions">
        <button><i class="fas fa-list"></i> Lister les codes à récupérer</button>
        <button><i class="fas fa-tag"></i> Imprimer des étiquettes</button>
        <button><i class="fas fa-copy"></i> Dupliquer un article</button>
      </div>
      <table>
        <thead>
          <tr>
            <th>Designation</th>
            <th>Description</th>
            <th>Categorie</th>
            <th>Prix unitaire</th>
            <th>Prix de vente</th>
            <th>Quantité</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Ordinateur portable</td>
            <td>HP G450 processeur 2.0GHZ</td>
            <td>Electronique</td>
            <td>899,00 €</td>
            <td>1000,00 €</td>
            <td>12</td>
            <td><button class="btn-action btn-edit">Modifier</button><button class="btn-action btn-delete">Supprimer</button></td>
          </tr>
          <tr>
            <td>Ordinateur portable</td>
            <td>HP G450 processeur 2.0GHZ</td>
            <td>Electronique</td>
            <td>899,00 €</td>
            <td>1000,00 €</td>
            <td>12</td>
            <td><button class="btn-action btn-edit">Modifier</button><button class="btn-action btn-delete">Supprimer</button></td>
          </tr>
          <tr>
            <td>Ordinateur portable</td>
            <td>HP G450 processeur 2.0GHZ</td>
            <td>Electronique</td>
            <td>899,00 €</td>
            <td>1000,00 €</td>
            <td>12</td>
            <td><button class="btn-action btn-edit">Modifier</button><button class="btn-action btn-delete">Supprimer</button></td>
          </tr>
          <tr>
            <td>Ordinateur portable</td>
            <td>HP G450 processeur 2.0GHZ</td>
            <td>Electronique</td>
            <td>899,00 €</td>
            <td>1000,00 €</td>
            <td>12</td>
            <td><button class="btn-action btn-edit">Modifier</button><button class="btn-action btn-delete">Supprimer</button></td>
          </tr>
          <tr>
            <td>Ordinateur portable</td>
            <td>HP G450 processeur 2.0GHZ</td>
            <td>Electronique</td>
            <td>899,00 €</td>
            <td>1000,00 €</td>
            <td>12</td>
            <td><button class="btn-action btn-edit">Modifier</button><button class="btn-action btn-delete">Supprimer</button></td>
          </tr>
          <tr>
            <td>Ordinateur portable</td>
            <td>HP G450 processeur 2.0GHZ</td>
            <td>Electronique</td>
            <td>899,00 €</td>
            <td>1000,00 €</td>
            <td>12</td>
            <td><button class="btn-action btn-edit">Modifier</button><button class="btn-action btn-delete">Supprimer</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>