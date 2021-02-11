# SocialLinks ![Statamic](https://flat.badgen.net/badge/Statamic/3.0+/FF269E)
This addon provides an easy way to generate social sharing links for channels like Facebook, Twitter and more.

## Installation
Install the addon using Composer.

```bash
composer require aerni/social-links
```

***

## Supported Channels

This addon supports the following social channels:
`Facebook`, `LinkedIn`, `Mail`, `Pinterest`, `Twitter`, `WhatsApp`, `Xing`

***

## Basic Usage

To create a sharing link, you have to call the tag followed by the channel of your choice.

```template
<!-- Facebook -->
{{ social_links:facebook }}

<!-- LinkedIn -->
{{ social_links:linkedin }}

<!-- Mail -->
{{ social_links:mail }}

<!-- Pinterest -->
{{ social_links:pinterest }}

<!-- Twitter -->
{{ social_links:twitter }}

<!-- WhatsApp -->
{{ social_links:whatsapp }}

<!-- Xing -->
{{ social_links:xing }}
```

The tag will use the URL of the current page by default. If you want to share a different URL, you may pass it using the `url` parameter.

```template
{{ social_links:facebook url="https://www.myveryspecialwebsite.com" }}
```

***

## Parameters

You may pass the following parameters to customize the generated link.

### Facebook

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `text` | The text of your post | Optional

### LinkedIn

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `title` | The title of your post | Optional
| `text` | The text of your post | Optional
| `source` | The source of your post | Optional

### Mail

The `url` will be placed in the body of the email. Anything you pass to the `body` parameter will be added after it.

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `to` | The email address you want to send the email to | Optional
| `cc` | The email address to CC | Optional
| `bcc` | The email address to BCC | Optional
| `subject` | The subject of the email | Optional
| `body` | The body of the email | Optional

### Pinterest

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `image` | The image to share | Optional

### Twitter

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `text` | The text of your Tweet | Optional
| `handle` | The twitter handle you want to add to the Tweet | Optional

### WhatsApp

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional

### Xing

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
