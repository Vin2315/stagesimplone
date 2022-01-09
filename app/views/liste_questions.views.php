<div class="question-list">
    <?php
    include '../dbconn.php';
    $sql_select_questions = 'SELECT * FROM question ORDER BY numero';
    $questions = $conexion->query($sql_select_questions);

    foreach ($questions as $question) {
    ?>
        <div class="question" id="question-<?php echo $question["id"]; ?>" data-id="<?php echo $question["id"]; ?>" data-numero="<?php echo $question["numero"]; ?>" data-category="<?php echo $question["category"]; ?>" data-question_link_type="<?php echo $question["question_link_type"]; ?>" data-question_link="<?php echo $question["question_link"]; ?>" data-question_label="<?php echo $question["question_label"]; ?>" data-reponse_type="<?php echo $question["reponse_type"]; ?>" data-option_a="<?php echo $question["option_a"]; ?>" data-option_b="<?php echo $question["option_b"]; ?>" data-option_c="<?php echo $question["option_c"]; ?>" data-option_d="<?php echo $question["option_d"]; ?>" data-reponse="<?php echo $question["reponse"]; ?>">
            <span class="numero">
                <?php echo $question["numero"]; ?>
            </span>
            <div>
                <b>Category:</b> <?php echo $question["category"]; ?>
            </div>
            <div>
                <b>Question:</b>
                <?php echo $question["question_label"]; ?>
            </div>
            <div>
                <b>A:</b>
                <?php echo $question["option_a"]; ?>
            </div>
            <div>
                <b>B:</b>
                <?php echo $question["option_b"]; ?>
            </div>
            <div>
                <b>C:</b>
                <?php echo $question["option_c"]; ?>
            </div>
            <div>
                <b>D:</b>
                <?php echo $question["option_d"]; ?>
            </div>
            <div>
                <b>Reponse:</b>
                <?php echo $question["reponse"]; ?>
            </div>
            <div class="controls">
                <button class="button-edition" type="button">Editer</button>
                <button class="button-suppression" type="button">Supprimer</button>
            </div>
        </div>
    <?php
    }
    ?>
</div>