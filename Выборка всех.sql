SELECT
  users_card.nameCard,
  users_notes.nameNote,
  users_password.namePass,
  users_wifi.nameWifi,
  users_card.idCardUser,
  users_notes.idNotes,
  users_password.idPass,
  users_wifi.idWifi
FROM users_card
  INNER JOIN user
    ON users_card.idUser = user.id
  INNER JOIN users_notes
    ON users_notes.idUser = user.id
  INNER JOIN users_password
    ON users_password.idUser = user.id
  INNER JOIN users_wifi
    ON users_wifi.idUser = user.id
WHERE user.id = 1
ORDER BY users_password.lastModified DESC, users_card.lastModified DESC, users_notes.lastModified DESC, users_wifi.lastModified DESC
LIMIT 1