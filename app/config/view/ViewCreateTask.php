<?php
require_once '../../config/init.php';

$tasks = TaskController::getAllTasks();

?>

<form action="../../config/routes/task.php?id=create" method="post">
        <div>
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="status">Statut :</label>
            <select id="status" name="status" required>
                <option value="0">À faire</option>
                <option value="1">Terminé</option>
            </select>
        </div>
        <div>
            <label for="date">Date :</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div>
            <button type="submit">Créer la Tâche</button>
        </div>
    </form>


    <h1 style="text-align: center;">Liste des Tâches</h1>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tasks as $task): ?>
               <form method="POST" action="../../config/routes/task.php?id=updateTask">
                <tr>
                    <td>
                        <input type="text" name="title" value="<?= htmlspecialchars($task['title']); ?>">
                    </td>
                    <td>
                        <input type="text" name="description" value="<?= htmlspecialchars($task['description']); ?>">
                    </td>
                    <td>
                        <select name="status">
                            <option value="0" <?= $task['status'] == 0 ? 'selected' : ''; ?>>À faire</option>
                            <option value="1" <?= $task['status'] == 1 ? 'selected' : ''; ?>>Terminé</option>
                        </select>
                    </td>
                    <td>
                        <input type="date" name="date" value="<?= htmlspecialchars($task['date']); ?>">
                    </td>
                    <td>
                    <div class="user-edit">
                            <form method="POST" action="../../config/routes/task.php?id=updateTask">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']); ?>">
                                <button type="submit" class="edit-btn">
                                    <span>Modifier</span>
                                </button>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="user-supp">
                            <form method="POST" action="../../config/routes/task.php?id=deleteTask" onsubmit="return confirm('Supprimer cet Tache ?');">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']); ?>">
                                <button type="submit" class="delete-btn" >
                                    <img src="../../public/img/bin.png" alt="supprimé">
                                </button>
                            </form>
                        </div>
                       
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    