/* Author DB SQL Querries */

/* General Selections */

    SELECT * FROM fans WHERE first_name = '$myFan';

    SELECT * FROM fans WHERE fans_id = '$fanId';

    SELECT * FROM lockout WHERE fans_id = '$fanId';

    SELECT promos_title FROM promos;

/* First Reader Selection */
    SELECT first_readers.fans_id, stories.stories_id, stories.stories_title FROM first_readers RIGHT JOIN stories ON first_readers.stories_id = stories.stories_id WHERE first_readers.fans_id = '$fanId';

/* ARC Reader Selection */
    SELECT arc_readers.fans_id, stories.stories_id, stories.stories_title FROM arc_readers RIGHT JOIN stories ON arc_readers.stories_id = stories.stories_id WHERE arc_readers.fans_id = '$fanId';

/* Contest Winner */
    SELECT contest_winner.fans_id, stories.stories_id, stories.stories_title FROM contest_winner RIGHT JOIN stories ON contest_winner.stories_id = stories.stories_id WHERE contest_winner.fans_id = '$fanId';

/* Fan Joins a Promo*/

    INSERT INTO first_readers (fans_id, stories_id, promos_id)
    VALUES ('$fanId'
           ,'$stories_id'
           ,'$promosId'
           );

    INSERT INTO arc_readers (fans_id, stories_id, promos_id)
    VALUES ('$fanId'
           ,'$stories_id'
           ,'$promosId'
           );

/* Updates */

    /* Fan Info Update */
    UPDATE fans SET first_name = '$newFirst', last_name = '$newLast', email = '$newEmail'
    WHERE fans_id = '$fanId';
    
    /* Review Update */
    
    UPDATE reviews SET reviews_vendor = '$newVendor', reviews_details = '$newDetails', reviews_date = '$newDate'
    WHERE arc_readers_id = '$ArcId';
    
    /* Feedback Update */
    
    UPDATE feedback SET feedback_details = '$newDetails', feedback_date = '$newDate'
    WHERE first_readers_id = '$ArcId';

/* Fan Leaves a Promo*/

    /* First Reader Deletion */
    DELETE FROM first_readers
    WHERE fans_id = '$fanId';

    /* ARC Reader Deletion */
    DELETE FROM arc_readers
    WHERE fans_id = '$fanId';