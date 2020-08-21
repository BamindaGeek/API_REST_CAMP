create
    definer = root@localhost procedure ps_AffectationMission(IN _affectationMissionId varchar(36),
                                                             IN _missionId varchar(36), IN _membreId varchar(36),
                                                             IN _createdBy varchar(36), IN _action varchar(100))
BEGIN 

    #Routine body goes here... 

    IF (_action='Insert') THEN 

        INSERT INTO affectationMission (affectationMissionId, missionId,membreId,createdBy) 

        VALUES (_affectationMissionId, _missionId,_membreId,_createdBy); 

    END IF; 

    IF (_action='UpdateById') THEN 

        UPDATE affectationMission 

        SET  

            missionId = _missionId,

            membreId=_membreId

        WHERE affectationMissionId=_affectationMissionId; 

    END IF; 

    IF (_action='DeleteById') THEN 

            UPDATE affectationMission 

            SET 

                status=0  

            WHERE   affectationMissionId =_affectationMissionId ; 

        END IF; 

 
 

        IF (_action='SelectAll') THEN 

            SELECT affectationMission.*,mission.libelle AS Aff_lib,membre.nom AS AffM_Membre
            			FROM affectationMission
    		INNER JOIN mission ON mission.missionId = affectationMission.missionId
			INNER JOIN membre ON membre.membreId = affectationMission.membreId
			where affectationMission.status=1;

    END IF; 

 
 

    IF (_Action='SelectById') THEN 

             SELECT affectationMission.*,mission.libelle AS Aff_lib,membre.nom AS AffM_Membre
            			FROM affectationMission
    		INNER JOIN mission ON mission.missionId = affectationMission.missionId
			INNER JOIN membre ON membre.membreId = affectationMission.membreId


                    WHERE affectationMission.affectationMissionId = _affectationMissionId and affectationMission.status=1; 

    END IF; 
END;

