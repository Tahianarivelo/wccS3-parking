---donnee axe
INSERT INTO axe VALUES(nextval('seq_axe'),'A',25,0.5,1,0,0);
INSERT INTO axe VALUES(nextval('seq_axe'),'B',25,0.5,1,0,0);
INSERT INTO axe VALUES(nextval('seq_axe'),'C',25,0.5,1,0,0);

---occupation
---| etat non occupe == 0
---| etat occupe == 1
INSERT INTO occupation VALUES(nextval('seq_occupation'),'1','8e6797ee0c73684df04df137f2b8063689d91745',2,'1258TAG','07/06/2020',10);
INSERT INTO occupation VALUES(nextval('seq_occupation'),'1','8e6797ee0c73684df04df137f2b8063689d91745',2,'1248TAG','07/06/2020',10);
INSERT INTO occupation VALUES(nextval('seq_occupation'),'1','8e6797ee0c73684df04df137f2b8063689d91745',2,'1258TAG','06/06/2020',10);
INSERT INTO occupation VALUES(nextval('seq_occupation'),'1','8e6797ee0c73684df04df137f2b8063689d91745',2,'1158TAG','06/06/2020',10);