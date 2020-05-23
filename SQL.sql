SELECT users_card.nameCard, users_card.idCardUser,('t_1') 
  AS tbl_name 
  FROM users_card 
  INNER JOIN user
    ON users_card.idUser = user.id
  WHERE users_card.nameCard LIKE '%Тинькофф%' AND user.id = 2
UNION
SELECT 
  users_password.namePass,users_password.idPass,('t_2') 
  FROM users_password 
   INNER JOIN user
    ON users_password.idUser = user.id
  WHERE users_password.namePass LIKE '%Тестовая%' AND user.id = 1
  UNION
SELECT 
   users_wifi.nameWifi, users_wifi.idWifi,('t_3') 
  FROM users_wifi 
   INNER JOIN user
    ON users_wifi.idUser = user.id
  WHERE users_wifi.nameWifi LIKE '%Тинькофф%' AND user.id = 2
    UNION
SELECT 
   users_notes.nameNote,users_notes.idNotes,('t_4') 
  FROM users_notes 
   INNER JOIN user
    ON users_notes.idUser = user.id
  WHERE users_notes.nameNote LIKE '%Тинькофф%' AND user.id = 2