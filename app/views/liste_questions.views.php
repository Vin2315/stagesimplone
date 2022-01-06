<div class="question-list">
    <?php
    include '../dbconn.php';
    $sql_select_questions = 'SELECT * FROM question ORDER BY numero';
    $questions = $conexion->query($sql_select_questions);
    foreach ($questions as $question) {
    ?>
        <div class="question" id="question-<?php echo $question["id"]; ?>" data-id="<?php echo $question["id"]; ?>" data-numero="<?php echo $question["numero"]; ?>" data-category="<?php echo $question["category"]; ?>" data-question_link_type="<?php echo $question["question_link_type"]; ?>" data-question_link="<?php echo $question["question_link"]; ?>" data-question_label="<?php echo $question["question_label"]; ?>" data-reponse_type="<?php echo $question["reponse_type"]; ?>" data-option_a="<?php echo $question["option_a"]; ?>" data-option_b="<?php echo $question["option_b"]; ?>" data-option_c="<?php echo $question["option_c"]; ?>" data-option_d="<?php echo $question["option_d"]; ?>" data-reponse="<?php echo $question["reponse"]; ?>">
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
                <?php echo $question["option_a"]; ?>
            </span>
            <span>
                <?php echo $question["option_b"]; ?>
            </span>
            <span>
                <?php echo $question["option_c"]; ?>
            </span>
            <span>
                <?php echo $question["option_d"]; ?>
            </span>
            <span>
                <?php echo $question["reponse"]; ?>
            </span>
            <div>
                <button class="button-edition" type="button">Editer</button>
                <button class="button-suppression" type="button">Supprimer</button>
            </div>
        </div>
    <?php
    }
    ?>
</div>