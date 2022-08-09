# Sanggar Rojolele

## What's in this repo

Typical company profile website built using codeigniter 4 framework. For the user authentication, Myth/Auth by Lonnieezell was used.
The web consist of home, about us, article and video page.

Article page uses pagination by codeigniter.

Video page displays all video that has been upload on the company's youtube channel. It is dynamic, everytime the company uploads video, the list on the website is automatically updated. For this I used youtube V3 api to retrieve company's video list (Video ID, Video Thumbnail, video title and video description). Later, the video ID is used to identify which video is going to be watched by user. For the "watching video" I only use youtube's iframe embedded video, using the information retrieved before (ID, title, etc)
