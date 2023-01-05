# SocialLinks ![Statamic](https://flat.badgen.net/badge/Statamic/3.0+/FF269E)
This addon provides an easy way to generate social profile and sharing links for channels like Facebook, Twitter and more.

## Installation
Install the addon using Composer.

```bash
composer require aerni/social-links
```

***

## Supported Channels

This addon supports the following social channels:
`Facebook`, `Instagram`, `LinkedIn`, `Mail`, `Pinterest`, `Telegram`, `Twitter`, `Vimeo`, `WhatsApp`, `Xing`, `YouTube`

***

## Profile Link

Create a link to a social profile by providing the social `channel` and `handle` of the profile:

```antlers
{{ social:profile channel="facebook" handle="michaelaerni" }}
```

Or using the shorthand:

```antlers
{{ social:facebook:profile handle="michaelaerni" }}
```

***

## Sharing Link

Create a sharing link by providing the social `channel`:

```antlers
{{ social:share channel="facebook" }}
```

Or using the shorthand:

```antlers
{{ social:facebook:share }}
```

### Parameters

There are a number of parameters you may use to customize the sharing links:

#### Facebook

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `text` | The text of your post | Optional

#### LinkedIn

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `title` | The title of your post | Optional
| `text` | The text of your post | Optional
| `source` | The source of your post | Optional

#### Mail

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `to` | The email address you want to send the email to | Optional
| `cc` | The email address to CC | Optional
| `bcc` | The email address to BCC | Optional
| `subject` | The subject of the email | Optional
| `body` | The body of the email | Optional

The `url` will be placed in the body of the email by default. You can customize the email body text by using the `body` parameter. Note, that this will override the default body text that includes the `url`. You will have to manually add the `url` in the `body` parameter like so:

```antlers
{{ social:mail:share body="I want to share this great site with you: {permalink}" }}
```

#### Pinterest

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `image` | The image to share | Optional

#### Telegram

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `text` | The description of your shared page | Optional

#### Twitter

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional
| `text` | The text of your Tweet | Optional
| `handle` | The twitter handle you want to add to the Tweet | Optional

#### WhatsApp

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional

#### Xing

| Name | Description | Usage |
|------|-------------|-------|
| `url` | The URL of the page to share | Optional


***

## Channel Name

Get the name of a social channel:

```antlers
{{ social:name channel="facebook" }}
```

Or using the shorthand:

```antlers
{{ social:facebook:name }}
```
***

## Tag Pair

You may also use a tag pair to get all the data at once:

```antlers
{{ social channel="facebook" handle="michaelaerni" }}
  {{ profile }}
  {{ share }}
  {{ name }}
{{ /social }}
```

Or using the shorthand:

```antlers
{{ social:facebook handle="michaelaerni" }}
  {{ profile }}
  {{ share }}
  {{ name }}
{{ /social:facebook }}`
```
