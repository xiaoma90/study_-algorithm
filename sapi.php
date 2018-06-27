<?php
/**
 * Created by PhpStorm.
 * User: wq334
 * Date: 2018/6/27
 * Time: 18:44
 */


<<<EOT
关于 php sapi模式
SAPI:Server Application Programming Interface 服务器端应用编程端口。它就是php 与其他应用交互的接口，PHP脚本要执行
有很多种方式，通过Web服务器，或者直接在命令行下，也可以嵌入在其他程序中。
SAPI提供了一个和外部通信的接口，常见的SAPI有：cgi 、fast-cgi、cli、isapi、apache 模块的 DLL

CGI
CGI即通用网关接口(Common Gateway Interface)，它是一段程序，通俗的讲CGI就象是一座桥，把网页和WEB服务器中的执行程序连
接起来，它把HTML接收的指令传递给服务器的执 行程序，再把服务器执行程序的结果返还给HTML页。CGI 的跨平台性能极佳，几乎可
以在任何操作系统上实现。
CGI方式在遇到连接请求（用户 请求）先要创建cgi的子进程，激活一个CGI进程，然后处理请求，处理完后结束这个子进程。这就是
fork-and-execute模式。所以用cgi 方式的服务器有多少连接请求就会有多少cgi子进程，子进程反复加载是cgi性能低下的主要原因。
都会当用户请求数量非常多时，会大量挤占系统的资源如内 存，CPU时间等，造成效能低下。

FastCGI
fast-cgi 是cgi的升级版本，FastCGI像是一个常驻(long-live)型的CGI，它可以一直执行着，只要激活后，不会每次都要花费时
间去fork一 次。PHP使用PHP-FPM(FastCGI Process Manager)，全称PHP FastCGI进程管理器进行管理。

FastCGI的工作原理:

Web Server启动时载入FastCGI进程管理器(IIS ISAPI或Apache Module)
FastCGI进程管理器自身初始化，启动多个CGI解释器进程(可见多个php-cgi)并等待来自Web Server的连接。
当客户端请求到达Web Server时，FastCGI进程管理器选择并连接到一个CGI解释器。Web server将CGI环境变量和标准输入发送
到FastCGI子进程php-cgi。
 FastCGI子进程完成处理后将标准输出和错误信息从同一连接返回Web Server。当FastCGI子进程关闭连接时，请求便告处理完成。
 FastCGI子进程接着等待并处理来自FastCGI进程管理器(运行在Web Server中)的下一个连接。 在CGI模式中，php-cgi在此便退出了。

在上述情况中，你可以想象CGI通常有多慢。每一个Web 请求PHP都必须重新解析php.ini、重新载入全部扩展并重初始化全部数据结
构。使用FastCGI，所有这些都只在进程启动时发生一次。一个额外的 好处是，持续数据库连
接(Persistent database connection)可以工作。

APACHE2HANDLER
PHP作为Apache模块，Apache服务器在系统启动后，预先生成多个进程副本驻留在内存中，一旦有请求出 现，就立即使用这些空余的子
进程进行处理，这样就不存在生成子进程造成的延迟了。这些服务器副本在处理完一次HTTP请求之后并不立即退出，而是停留在计 算机
中等待下次请求。对于客户浏览器的请求反应更快，性能较高。


apache模块的DLL：
该运行模式是我们以前在windows环境下使用apache服务器经常使用的，而在模块化(DLL)中，PHP是与Web服务器一起启动并运行的。
（是apache在CGI的基础上进行的一种扩展，加快PHP的运行效率）



ISAPI:
ISAPI即Internet Server Application Program Interface，是微软提供的一套面向Internet服务的API接口.
一个ISAPI的DLL，可以在被用户请求激活后长驻内存，等待用户的另一个请求，还可以在一个DLL里设置多个用户请求处理函数，此外，
ISAPI的DLL应用程序和WWW服务器处于同一个进程中，效率要显著高于CGI。

cli:
cli是php的命令行运行模式，大家经常会使用它，但是可能并没有注意到（例如：我们在linux下经常使用 “php -m”查找PHP安装
了那些扩展就是PHP命令行运行模式；

EOT;
