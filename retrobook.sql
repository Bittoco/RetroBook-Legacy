-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: mysql.mydevil.net
-- Czas generowania: 19 Wrz 2023, 16:56
-- Wersja serwera: 8.0.33
-- Wersja PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `m37345_retrobook`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `app`
--

CREATE TABLE `app` (
  `name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `datemade` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `caption` text COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `emails`
--

CREATE TABLE `emails` (
  `toe` text COLLATE utf8mb4_general_ci NOT NULL,
  `frome` text COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `subject` text COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `friendalert`
--

CREATE TABLE `friendalert` (
  `sendto` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `whofriended` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `whofriendedid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `friendgame`
--

CREATE TABLE `friendgame` (
  `email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `score` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `friends`
--

CREATE TABLE `friends` (
  `friend1` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `friend2` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `fid1` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `fid2` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groupmem`
--

CREATE TABLE `groupmem` (
  `fgroup` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `groupid` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE `groups` (
  `name` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `creator` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `pfp` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `annoucement` varchar(210) COLLATE utf8mb4_general_ci NOT NULL,
  `tableh1` text COLLATE utf8mb4_general_ci NOT NULL,
  `customtable` text COLLATE utf8mb4_general_ci NOT NULL,
  `tableh2` text COLLATE utf8mb4_general_ci NOT NULL,
  `customtable2` varchar(310) COLLATE utf8mb4_general_ci NOT NULL,
  `datemade` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `invites`
--

CREATE TABLE `invites` (
  `fromid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `fromname` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `groupid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `groupname` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `toid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messageboard`
--

CREATE TABLE `messageboard` (
  `fgroup` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `creator` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `creatorname` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messages`
--

CREATE TABLE `messages` (
  `toemail` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `fromemail` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `toid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `fromid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `notes`
--

CREATE TABLE `notes` (
  `fromemail` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `fromid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(3000) COLLATE utf8mb4_general_ci NOT NULL,
  `file` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `filetype` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `altdate` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `photos`
--

CREATE TABLE `photos` (
  `fromname` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `fromid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `caption` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `poke`
--

CREATE TABLE `poke` (
  `fromname` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `fromid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `toid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profilesongs`
--

CREATE TABLE `profilesongs` (
  `songid` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profilewall`
--

CREATE TABLE `profilewall` (
  `type` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `fromname` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `fromid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `toid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `gifttype` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `replies`
--

CREATE TABLE `replies` (
  `creatorid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `creatorname` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `ogmessage` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `text` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `songs`
--

CREATE TABLE `songs` (
  `title` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `file` text COLLATE utf8mb4_general_ci NOT NULL,
  `profileid` text COLLATE utf8mb4_general_ci NOT NULL,
  `artist` text COLLATE utf8mb4_general_ci NOT NULL,
  `video` text COLLATE utf8mb4_general_ci NOT NULL,
  `dateadded` text COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `userapps`
--

CREATE TABLE `userapps` (
  `name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `appname` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `appid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `mid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `status` text COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `datejoined` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `lastupdated` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `sex` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `bday` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `sbday` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `residence` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `hschool` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `screenname` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `websites` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `lookingfor` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `interested` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `rstatus` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `pviews` text COLLATE utf8mb4_general_ci NOT NULL,
  `interests` text COLLATE utf8mb4_general_ci NOT NULL,
  `music` text COLLATE utf8mb4_general_ci NOT NULL,
  `displayemail` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `onlinestatus` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `favbook` text COLLATE utf8mb4_general_ci NOT NULL,
  `favmovies` text COLLATE utf8mb4_general_ci NOT NULL,
  `favquotes` text COLLATE utf8mb4_general_ci NOT NULL,
  `aboutme` text COLLATE utf8mb4_general_ci NOT NULL,
  `away` text COLLATE utf8mb4_general_ci NOT NULL,
  `pfp` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `act` text COLLATE utf8mb4_general_ci NOT NULL,
  `accountvis` text COLLATE utf8mb4_general_ci NOT NULL,
  `messagevis` text COLLATE utf8mb4_general_ci NOT NULL,
  `friendvis` text COLLATE utf8mb4_general_ci NOT NULL,
  `photovis` text COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `videos`
--

CREATE TABLE `videos` (
  `creator` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `caption` text COLLATE utf8mb4_general_ci NOT NULL,
  `video` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `datemade` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wall`
--

CREATE TABLE `wall` (
  `fromname` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `fromid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `toid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `typewall` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `noteid` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `noteemail` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `altdate` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `friendalert`
--
ALTER TABLE `friendalert`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `friendgame`
--
ALTER TABLE `friendgame`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `groupmem`
--
ALTER TABLE `groupmem`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `messageboard`
--
ALTER TABLE `messageboard`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `poke`
--
ALTER TABLE `poke`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `profilesongs`
--
ALTER TABLE `profilesongs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `profilewall`
--
ALTER TABLE `profilewall`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `userapps`
--
ALTER TABLE `userapps`
  ADD PRIMARY KEY (`mid`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wall`
--
ALTER TABLE `wall`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `app`
--
ALTER TABLE `app`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `friendalert`
--
ALTER TABLE `friendalert`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `friendgame`
--
ALTER TABLE `friendgame`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `groupmem`
--
ALTER TABLE `groupmem`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `invites`
--
ALTER TABLE `invites`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `messageboard`
--
ALTER TABLE `messageboard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `poke`
--
ALTER TABLE `poke`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `profilesongs`
--
ALTER TABLE `profilesongs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `profilewall`
--
ALTER TABLE `profilewall`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `userapps`
--
ALTER TABLE `userapps`
  MODIFY `mid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `wall`
--
ALTER TABLE `wall`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
