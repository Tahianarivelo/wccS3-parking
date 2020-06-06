---donnee axe
INSERT INTO axe VALUES(nextval('seq_axe'),'A',25,0.5,1,0,0);
INSERT INTO axe VALUES(nextval('seq_axe'),'B',25,0.5,1,0,0);
INSERT INTO axe VALUES(nextval('seq_axe'),'C',25,0.5,1,0,0);

---occupation
---| etat non occupe == 0
---| etat occupe == 1
INSERT INTO occupation VALUES('1',2,0);