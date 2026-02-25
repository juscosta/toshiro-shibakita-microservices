# Toshiro Shibakita — Microservices com Docker (versão melhorada)

Versão melhorada do projeto original, aplicando boas práticas:
- Sem IP fixo (rede interna do Docker)
- Credenciais via variáveis de ambiente
- MySQL containerizado com init automático do banco
- Nginx como reverse proxy
- App PHP pronto para escalar

## Pré-requisitos
- Docker Desktop (Windows) com WSL2 habilitado

## Como rodar
1) Crie o .env
Copie o arquivo de exemplo e ajuste se quiser:
- Windows PowerShell:
  Copy-Item .env.example .env

2) Suba os containers
docker compose up -d --build

3) Acesse
http://localhost:4500

## Escalar o app (balanceamento)
docker compose up -d --build --scale app=3

Atualize a página e observe o valor de Host mudando.
