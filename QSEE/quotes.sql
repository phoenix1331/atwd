
CREATE TABLE category(
	cid	INTEGER NOT NULL,
	name	VARCHAR(128) NOT NULL,

	CONSTRAINT	pk_category PRIMARY KEY (cid)
);


CREATE TABLE author(
	aid	INTEGER NOT NULL,
	sname	VARCHAR(64),
	fname	VARCHAR(64),
	dob	VARCHAR(16),
	dod	VARCHAR(16),
	link	VARCHAR(128),

	CONSTRAINT	pk_author PRIMARY KEY (aid)
);


CREATE TABLE quote(
	qid	INTEGER NOT NULL,
	text	VARCHAR(256),
	fk1_aid	INTEGER NOT NULL,

	CONSTRAINT	pk_quote PRIMARY KEY (qid)
);


CREATE TABLE category_quote_categories_quote(
	s_cid	INTEGER NOT NULL,
	d_qid	INTEGER NOT NULL,
	PRIMARY KEY (s_cid,d_qid),
	FOREIGN KEY(s_cid) REFERENCES category(cid) ON DELETE RESTRICT ON UPDATE RESTRICT,
	FOREIGN KEY(d_qid) REFERENCES quote(qid) ON DELETE RESTRICT ON UPDATE RESTRICT
);



ALTER TABLE quote ADD CONSTRAINT fk1_quote_to_author FOREIGN KEY(fk1_aid) REFERENCES author(aid) ON DELETE RESTRICT ON UPDATE RESTRICT;


