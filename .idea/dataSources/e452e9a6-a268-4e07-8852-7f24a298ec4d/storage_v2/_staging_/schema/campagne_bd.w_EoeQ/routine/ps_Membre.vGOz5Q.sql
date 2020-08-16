create
    definer = root@localhost procedure ps_Membre(IN _membreId varchar(36), IN _numeroElecteur varchar(36),
                                                 IN _nom varchar(100), IN _prenom varchar(100), IN _email varchar(100),
                                                 IN _contact varchar(36), IN _sex char(10), IN _communeId varchar(36),
                                                 IN _lieuVoteId varchar(36), IN _dateNaissance varchar(15),
                                                 IN _lieuNaissance varchar(36), IN _adressePhysique varchar(255),
                                                 IN _adressePostale varchar(255), IN _profession varchar(255),
                                                 IN _nomPere varchar(255),
                                                 IN _prenomPere varchar(255), IN _dateNaissancePere varchar(15),
                                                 IN _lieuNaissancePere varchar(255), IN _nomMere varchar(255),
                                                 IN _prenomMere varchar(255), IN _dateNaissanceMere varchar(15),
                                                 IN _lieuNaissanceMere varchar(255), IN _createdBy varchar(36))
BEGIN 

    #Routine body goes here... 

    IF (_action='Insert') THEN 

        INSERT INTO membre (membreId,numeroElecteur,nom,prenom,email,contact,sex,communeId,lieuVoteId, dateNaissance,lieuNaissance,adressePhysique,adressePostale,profession,nomPere,prenomPere,dateNaissancePere,lieuNaissancePere, nomMere,prenomMere,dateNaissanceMere,lieuNaissanceMere,createdBy)

        VALUES (_membreId,_numeroElecteur,_nom,_prenom,_email,_contact,_sex,_communeId,_lieuVoteId, _dateNaissance,_lieuNaissance,_adressePhysique,_adressePostale,profession,_nomPere,_prenomPere,_dateNaissancePere,_lieuNaissancePere,_nomMere,_prenomMere,_dateNaissanceMere,_lieuNaissanceMere,_createdBy);

    END IF; 

    IF (_action='UpdateById') THEN 

        UPDATE campagne 

        SET  

            membreId = _membreId, 
            numeroElecteur=_numeroElecteur,
            nom = _nom, 
            prenom =_nom ,          
            email=_email,
            contact=_contact,
            sex=_sex,
            communeId=_communeId,
            lieuVoteId=_lieuVoteId,
            dateNaissance=_dateNaissance,
            lieuNaissance=_lieuNaissance,
            adressePhysique=_adressePhysique,
            adressePostale=_adressePostale,
            profession=_profession,
            typeMembreId=_typeMembreId,
            nomPere=_nomPere,
            prenomPere=_prenomPere,
            dateNaissancePere=_dateNaissancePere,
            lieuNaissancePere=_dateNaissancePere,
            nomMere=_nomMere,
            prenomMere=_prenomMere,
            dateNaissanceMere=_dateNaissanceMere,
            lieuNaissanceMere=_dateNaissanceMere

        WHERE campagneId=_campagneId; 

    END IF; 

    IF (_Action='Delete') THEN 

            UPDATE campagne 

            SET 

                status=0  

            WHERE   campagneId =_campagneId ; 

        END IF; 

 
 

        IF (_Action='SelectAll') THEN 

            SELECT * FROM campagne_bd.campagne 
            Where status=1; 

    END IF; 

 
 

    IF (_Action='SelectById') THEN 

            SELECT * FROM campagne_bd.campagne 

                    WHERE campagne_bd.campagne.campagneId = _campagneId and status=1; 

    END IF; 

 
 

     

END;

