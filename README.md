# Social ![Statamic](https://img.shields.io/badge/statamic-2.10-blue.svg?style=flat-square)
Social provides an easy way to generate social sharing links for channels like Facebook, Twitter and more.

## Installation

1. Simply copy the `Social` folder into `site/addons/`.
2. That’s it, you’re done!

***

## Social Channels

This addon supports the following social channels:  
`Facebook`, `Twitter`, `LinkedIn`, `Pinterest`, `WhatsApp`, `Email`

***

## Basic Usage

To create a sharing link, you have to call the tag followed by the channel of your choice.

```template
<!-- Facebook -->
{{ social:facebook }}

<!-- Twitter -->
{{ social:twitter }}

<!-- LinkedIn -->
{{ social:linkedin }}

<!-- Pinterest -->
{{ social:pinterest }}

<!-- WhatsApp -->
{{ social:whatsapp }}

<!-- Email -->
{{ social:mail }}
```

The `{{ social }}` tag will use the URL of the current page by default. If you want to share a different URL, you may pass it using the `url` parameter.

```template
{{ social:facebook url="https://www.myveryspecialwebsite.com" }}
```

***

## Parameters

You may pass the following parameters to customize the generated link.

### Facebook

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional

### Twitter

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `text` | The text of your Tweet | Optional
| `handle` | The twitter handle you want to add to the Tweet | Optional

### LinkedIn

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `title` | The title of your post | Optional
| `text` | The text of your post | Optional
| `source` | The source of your post | Optional

### Pinterest

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `image` | The image to share | Optional

### WhatsApp

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional

### Email

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `mailto` | The email address you want to send the email to | Required
| `cc` | The email address to CC | Optional
| `bcc` | The email address to BCC | Optional
| `subject` | The subject of the email | Optional
| `body` | The body of the email | Optional