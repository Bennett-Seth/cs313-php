/* Alter first_readers table to reference promo instead of date */

ALTER TABLE first_readers 
DROP COLUMN first_readers_deadline;

ALTER TABLE first_readers
ADD COLUMN promos_id INT;

ALTER TABLE first_readers
ADD FOREIGN KEY (promos_id) 
REFERENCES promos (promos_id);

/* Insert data into Super Fans Database */

INSERT INTO fans (first_name, last_name, email, fans_reg_date) 
VALUES ('Sally'
, 'Sunshine'
, 'sallysun@yahoo.com'
, '01/15/1988'
);

INSERT INTO fans (first_name, last_name, email, fans_reg_date) 
VALUES ('Joe'
, 'Somebody'
, 'joesom@yahoo.com'
, '02/14/1981'
);

INSERT INTO fans (first_name, last_name, email, fans_reg_date) 
VALUES ('Tommy'
, 'Taylor'
, 'tommytay@yahoo.com'
, '05/17/1962'
);

INSERT INTO fans (first_name, last_name, email, fans_reg_date) 
VALUES ('Bad'
, 'Betty'
, 'badbetty@yahoo.com'
, '09/17/1999'
);

INSERT INTO fans (first_name, last_name, email, fans_reg_date) 
VALUES ('Mean'
, 'Morty'
, 'meanmort@yahoo.com'
, '12/26/1997'
);

INSERT INTO stories (stories_title, stories_sub_title, stories_type, series, genre ,stories_pub_date)
VALUES ('Decoy'
, 'The worst plagues spawn from within.'
, 'Novel'
, 'Assassin''s Rising'
, 'Fantasy'
, '09/01/2011'
);

INSERT INTO stories (stories_title, stories_sub_title, stories_type, series, genre ,stories_pub_date)
VALUES ('Unseen Secrets'
, 'Seeing everything comes with a price.'
, 'Novel'
, 'Shattered Realms'
, 'Fantasy'
, '05/01/2013'
);

INSERT INTO stories (stories_title, stories_sub_title, stories_type, series, genre ,stories_pub_date)
VALUES ('The First Strain'
, 'It doesn''t matter how far you can run... They will find you.'
, 'Novel'
, 'Corrupted Genes'
, 'Science Fiction'
, '11/01/2014'
);

INSERT INTO stories (stories_title, stories_sub_title, stories_type, series, genre ,stories_pub_date)
VALUES ('Death''s Edge'
, 'Humanity''s greatest threat lies within us.'
, 'Novel'
, 'Claws and Steel'
, 'Science Fiction'
, '10/01/2015'
);

ALTER TABLE promos 
RENAME COLUMN promos_dimentions TO promos_dimensions;

INSERT INTO promos (promos_title, promos_type, promos_path, promos_dimensions, promos_start_date, promos_end_date)
VALUES ('Decoy Launch'
, 'Book Launch'
, 'GBP/novels/fantasy/kt/promos/kt1_promo.jpg'
, '600 x 1200 px'
, '09/01/2011'
, '10/01/2011'
);

INSERT INTO promos (promos_title, promos_type, promos_path, promos_dimensions, promos_start_date, promos_end_date)
VALUES ('Unseen Secrets Raffle'
, 'Raffle'
, 'GBP/novels/fantasy/kv/promos/kv1_promo.jpg'
, '1800 x 600 px'
, '05/01/2013'
, '06/01/2013'
);

INSERT INTO promos (promos_title, promos_type, promos_path, promos_dimensions, promos_start_date, promos_end_date)
VALUES ('First Strain Launch'
, 'First Read'
, 'GBP/novels/sci_fi/z/promos/z1_promo.jpg'
, '600 x 400 px'
, '11/01/2014'
, '12/01/2014'
);

INSERT INTO promos (promos_title, promos_type, promos_path, promos_dimensions, promos_start_date, promos_end_date)
VALUES ('Death''s Edge Launch'
, 'ARC Read'
, 'GBP/novels/sci_fi/f/promos/f1_promo.jpg'
, '900 x 300 px'
, '10/01/2015'
, '11/01/2015'
);

INSERT INTO lockout (fans_id, lockout_reason, lockout_date)
VALUES (04
, 'Bad Betty stalked me at a local writing convention. Creepy!'
, '11/17/2015'
);

INSERT INTO lockout (fans_id, lockout_reason, lockout_date)
VALUES (05
, 'Mean Mort wasted half my interview asking me about my cat. I don''t have a cat.'
, '4/27/2016'
);

INSERT INTO first_readers (fans_id, stories_id, promos_id)
VALUES (01
       ,03
       ,03
       );
       
INSERT INTO first_readers (fans_id, stories_id, promos_id)
VALUES (03
       ,03
       ,03
       );
       
INSERT INTO arc_readers (fans_id, stories_id, promos_id)
VALUES (02
       ,04
       ,04
       );
       
INSERT INTO arc_readers (fans_id, stories_id, promos_id)
VALUES (03
       ,04
       ,04
       );
       
INSERT INTO contest_winner (fans_id, stories_id, promos_id)
VALUES (02
       ,02
       ,02
       );
       
INSERT INTO contest_winner (fans_id, stories_id, promos_id)
VALUES (01
       ,02
       ,02
       );

INSERT INTO free_stories (stories_id, stories_cover_path,stories_mobi_path,stories_epub_path,stories_blurb_path )
VALUES (03
       ,'GBP/novels/sci_fi/z/z1/z1_ecover.jpg'
       ,'GBP/novels/sci_fi/z/z1/z1.mobi'
       ,'GBP/novels/sci_fi/z/z1/z1.epub'
       ,'GBP/novels/sci_fi/z/z1/z1_blurb.doc'
       );

INSERT INTO arc_stories (stories_id,stories_cover_path,stories_mobi_path,stories_epub_path,stories_blurb_path)
VALUES(04
       ,'GBP/novels/sci_fi/f/f1/f1_ecover.jpg'
       ,'GBP/novels/sci_fi/f/f1/f1.mobi'
       ,'GBP/novels/sci_fi/f/f1/f1.epub'
       ,'GBP/novels/sci_fi/f/f1/f1_blurb.doc'
      );
      
INSERT INTO feedback (first_readers_id,stories_id,feedback_details,feedback_date ) 
VALUES (01
,03
,'Great book. I loved the action scenes and the way Patches and Michael grew to rely upon eachother.'
,'11/11/2014'
);

INSERT INTO feedback (first_readers_id,stories_id,feedback_details,feedback_date ) 
VALUES (02
,03
,'It was alright. I wish would could have spent more time learning about the Alurch, to see things from their point of view.'
,'11/15/2014'
);

INSERT INTO reviews (arc_readers_id,stories_id,reviews_vendor,reviews_details,reviews_date)
VALUES (01
,04
,'Amazon'
, 'This was an exciting glimpse into a fasinating post-apocalyptic world.'
,'10/12/2015'
);

INSERT INTO reviews (arc_readers_id, stories_id, reviews_vendor, reviews_details, reviews_date)
VALUES (02
,04
,'Kobo'
,'This sci-fi adventure will grip you until the very end and never let go!'
,'10/22/2015'
);

INSERT INTO arc_addresses (arc_readers_id, arc_address_street, arc_address_city, arc_address_state, arc_address_zip, arc_address_country)
VALUES (01
,'15432 NE 152nd Ave.'
,'Brush Prairie'
,'WA'
,'98606'
,'Clark'
);

INSERT INTO arc_addresses (arc_readers_id, arc_address_street, arc_address_city, arc_address_state, arc_address_zip, arc_address_country)
VALUES (02
,'1203 NE Kalama Kove'
,'Kelso'
,'WA'
,'98626'
,'Cowlitz'
);

ALTER TABLE fans
ADD COLUMN passwords VARCHAR(255);









