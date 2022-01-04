<div class="question-list">
    <?php
    include '../dbconn.php';
    $sql_select_questions = 'SELECT * FROM question ORDER BY numero';
    $questions = $conexion->query($sql_select_questions);
    foreach ($questions as $question) {
    ?>
        <div class="question">
            <span>
                <?php echo $question["numero"]; ?>
            </span>
            <span>
                <?php echo $question["category"]; ?>
            </span>
            <span>
                <?php echo $question["question_label"]; ?>
            </span>
            <span>
                <?php echo $question["option_A"]; ?>
            </span>
            <span>
                <?php echo $question["option_B"]; ?>
            </span>
            <span>
                <?php echo $question["option_C"]; ?>
            </span>
            <span>
                <?php echo $question["option_D"]; ?>
            </span>
            <span>
                <?php echo $question["reponse"]; ?>
            </span>
            <div>
                <button type="button">Editer</button>
                <button type="button">Supprimer</button>
            </div>
        </div>
    <?php
    }
    ?>
</div>