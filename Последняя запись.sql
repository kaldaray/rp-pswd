SELECT
  users_password.namePass,
  users_password.lastModified
FROM users_password
  INNER JOIN user
    ON users_password.idUser = user.id
ORDER BY users_password.lastModified DESC LIMIT 1