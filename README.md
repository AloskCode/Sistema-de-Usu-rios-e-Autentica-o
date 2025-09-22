# README.md

## Integrantes

- Guilherme Dorce de Britto — RA: 1991866  
- Thiago Tsuyoshi Okada Aoki — RA: 2002282  

---

## Descrição do Projeto

Sistema de autenticação de usuários em PHP, desenvolvido com Programação Orientada a Objetos (POO).  
O sistema permite cadastrar usuários, realizar login, redefinir senha e validar dados com regras de segurança.  

---

## Como Executar no XAMPP

1. Instale e abra o XAMPP 
2. Coloque a pasta `project/` dentro da pasta `htdocs/` do XAMPP  
3. Inicie o Apache no painel do XAMPP  
4. Acesse pelo navegador:  
   ```
   http://localhost/project/index.php
   ```

---

## Estrutura do Projeto

```
project/
│
├── src/
│   ├── User.php
│   ├── UserManager.php
│   └── Validator.php
│
├── initialUsers.php
├── index.php
└── README.md
```

---

## Casos de Uso Testados

| Caso | Ação                             | Entrada                                  | Resultado Esperado                        |
|------|----------------------------------|---------------------------------------------|----------------------------------------------|
| 1    | Cadastro válido                   | Nome, e-mail e senha fortes                  | Usuário cadastrado com sucesso                |
| 2    | Cadastro com e-mail inválido      | E-mail sem @ ou domínio                      | Retorna mensagem de erro de e-mail inválido   |
| 3    | Cadastro com senha fraca           | Senha curta, sem maiúscula, número ou especial | Retorna mensagem de erro de senha fraca       |
| 4    | Login com credenciais corretas     | E-mail e senha válidos                        | Login bem-sucedido                            |
| 5    | Reset de senha                     | Nova senha válida para usuário existente      | Senha alterada com sucesso                    |

---

## Segurança do Sistema

Este sistema foi projetado com foco na **segurança dos dados dos usuários**:

- Todos os e-mails e senhas passam por sanitização antes de serem processados, usando `filter_var()` para remover scripts, caracteres invisíveis e conteúdo malicioso.
- O e-mail é validado com a função nativa `filter_var(FILTER_VALIDATE_EMAIL)`, que cobre os formatos corretos aceitos pelo PHP.
- A senha é validada com Regex forte, exigindo:  
  - Pelo menos 1 letra minúscula  
  - Pelo menos 1 letra maiúscula  
  - Pelo menos 1 número  
  - Pelo menos 1 caractere especial  
  - Mínimo de 8 caracteres  
- As senhas são armazenadas como hashes seguros gerados com `password_hash()` usando `PASSWORD_DEFAULT` (bcrypt).  
- No login, o sistema usa `password_verify()` para comparar a senha digitada com o hash salvo.  
- O uso de salt aleatório embutido em cada hash impede ataques com rainbow tables.  
- Essas práticas protegem o sistema contra ataques como XSS, injeções de código e força bruta.
