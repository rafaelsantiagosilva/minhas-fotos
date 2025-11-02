# 📸 Minhas Fotos

## ⚙️ Requisitos Funcionais

- [x] O usuário deve poder se cadastrar
- [ ] O usuário deve poder fazer login
- [ ] O usuário deve poder deslogar de sua conta
- [ ] O usuário deve poder fazer upload uma imagem, com um nome e uma descrição
- [ ] O usuário deve poder visualizar suas imagens
- [ ] O usuário deve poder editar as informações de suas imagens
- [ ] O usuário deve poder excluir uma imagem

## ✍️ Requisitos Não Funcionais

- [x] A senha deve ser criptografada
- [x] Não deve ser possível cadastrar mais de uma conta com o mesmo e-mail
- [x] O banco de dados deve ser o MySQL
- [ ] Só se deve carregar até 10 imagens por página
- [ ] Deve haver uma página de 404

## 💼 Regras de Negócio

- [ ] O usuário não deve poder acessar nenhuma página além de login ou criação de conta caso não esteja autenticado
- [ ] O usuário não deve poder fazer o upload de outros arquivos que não sejam imagens
- [ ] O usuário não deve poder fazer o upload de imagens com mais de 15mb
- [ ] Se o usuário acessar uma página privada sem estar cadastrado, ele deve ser redirecionado para a página de login
- [ ] Se o usuário acessar uma página inexistente, ele deve ser redirecionado para a página de 404
- [ ] As imagens devem ser ordenadas com base em sua ordem de criação
